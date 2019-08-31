<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Materi;
use App\Models\Berkas;
use App\Models\Narasi;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\Mid;
use App\Models\Akhir;

use ADHhelper;

use DB;

class MateriController extends Controller
{

    public function berkas($id)
    {
        $materi = Materi::with('berkas')->find($id);

        $filePath = storage_path('app/public/files/berkas/' . $materi->berkas->id);
        $fileName = $materi->berkas->filename;

        return ADHhelper::openFileWithFileName($filePath, $fileName);
    }

    public function index()
    {
        $materis = Materi::all();

        return view('materi.index', compact(['materis']));
    }

    public function create()
    {
        return view('materi.create', compact([]));
    }

    public function store(Request $request)
    {
        $request['durasi'] = str_replace('.', '', $request['durasi']);
        $request->validate([
            'unit' => 'required',
            'materi' => 'required',
            'deskripsi' => 'required',
            'berkas' => 'required|file|mimes:pdf',
            'durasi' => 'required|numeric|min:10',
        ]);

        $data = $request->only('unit', 'materi', 'deskripsi', 'durasi');
        
        $id_materi = DB::table('materi')->insertGetId($data);

        $berkas = $request->file('berkas');
        $id_files = DB::table('files')->insertGetId([
            'id_materi' => $id_materi,
            'filename' => $berkas->getClientOriginalName(),
        ]);

        $berkas->move(storage_path('app/public/files/berkas'), $id_files);

        return redirect()->route('materi.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $materi = Materi::find($id);

        return view('materi.edit', compact(['materi']));
    }

    public function update(Request $request, $id)
    {        
        $materi = Materi::find($id);

        $request['durasi'] = str_replace('.', '', $request['durasi']);
        $request->validate([
            'unit' => 'required',
            'materi' => 'required',
            'deskripsi' => 'required',
            'berkas' => 'file|mimes:pdf',
            'durasi' => 'required|numeric|min:10',
        ]);

        $data = $request->only('unit', 'materi', 'deskripsi', 'durasi');
        
        Materi::where('id', $id)->update($data);

        $berkas = $request->file('berkas');
        if ($berkas) {
            $files = $materi->berkas;
            $files->filename = $berkas->getClientOriginalName();
            $files->save();
            
            $berkas->move(storage_path('app/public/files/berkas'), $files->id);
        }

        return redirect()->route('materi.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            $berkas = Berkas::where(['id_materi' => $id])->first();   
            Berkas::where(['id_materi' => $id])->delete();   
            unlink(storage_path('app/public/files/berkas/' . $berkas->id));
            Materi::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('materi.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }

    public function ujian($id_materi)
    {
        if (Ujian::where(['id_materi' => $id_materi, 'id_user' => session('userID')])->first()) {
            return redirect()->route('materi.index')->with('alert', [
                'title' => 'ERROR !!!',
                'message' => 'Anda Sudah Ujian',
                'class' => 'error',
            ]);
        }

        $materi = Materi::find($id_materi);
        $narasis = Narasi::where('id_materi', $materi->id)->orderBy('no')->get();
        $soals = [];
        $narasis_keys = [];
        $narasis_keys_reversed = [];
        $i = 0;
        foreach ($narasis as $narasi) {
            $narasis_keys[$i] = $narasi->id;
            $narasis_keys_reversed[$narasi->id] = $i;
            $soals[$narasi->id] = Soal::where('id_cerita', $narasi->id)->orderBy('no')->get();
            $i++;
        }
        $type = 'materi';
        
        return view('materi.ujian', compact(['materi', 'soals', 'type', 'narasis', 'narasis_keys', 'narasis_keys_reversed']));
    }

    public function simpanUjian(Request $request, $id_materi)
    {
        $materi = Materi::with('narasis.soals')->find($id_materi);
        
        $jmlSoal = 0;
        foreach ($materi->narasis as $narasi) {
            foreach ($narasi->soals as $soal) {
                $jmlSoal++;
            }    
        }

        $jawabans = $request->soal ?: [];
        $soals_raw = array_keys($jawabans);
        $soals = Soal::whereIn('id', $soals_raw)->get();

        $benar = 0;
        foreach ($soals as $soal) {
            if ($jawabans[$soal->id] == $soal->kunci) {
                $benar++;
            }
        }

        $nilai = (int)($benar / $jmlSoal * 100);
        
        Ujian::insert([
            'id_user' => session('userID'),
            'id_materi' => $id_materi,
            'nilai' => $nilai,
            'waktu' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('materi.index');
    }

    public function nilai($id_materi)
    {
        $type = 'materi';
        $materi = Materi::find($id_materi);
        $nilais = Ujian::where('id_materi', $materi->id)->with('user')->get();

        return view('materi.nilai', compact(['materi', 'nilais', 'type']));
    }

    public function nilaiMid()
    {
        $type = 'mid';
        $nilais = Mid::with('user')->get();

        return view('materi.nilai', compact(['nilais', 'type']));
    }

    public function nilaiAkhir()
    {
        $type = 'akhir';
        $nilais = Akhir::with('user')->get();

        return view('materi.nilai', compact(['nilais', 'type']));
    }

    public function hapusNilai($id)
    {
        $ujian = Ujian::find($id);
        try {
            Ujian::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('materi.nilai', $ujian->id_materi)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);  
    }

    public function hapusNilaiMid($id)
    {
        try {
            Mid::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('materi.nilaiMid')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);  
    }

    public function hapusNilaiAkhir($id)
    {
        try {
            Akhir::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('materi.nilaiAkhir')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);  
    }

    public function mid()
    {
        if (Mid::where(['id_user' => session('userID')])->first()) {
            return redirect()->route('materi.index')->with('alert', [
                'title' => 'ERROR !!!',
                'message' => 'Anda Sudah Ujian',
                'class' => 'error',
            ]);
        }

        $materis = Materi::all();
        $type = 'mid';

        $soals = [];
        foreach ($materis as $materi) {
            $tempSoals = Soal::where('id_materi', $materi->id)->inRandomOrder()->limit($materi->jumlah_pertanyaan_mid)->get();

            foreach ($tempSoals as $tempSoal) {
                $soals[] = $tempSoal;
            }
        }

        return view('materi.ujian', compact(['materi', 'soals', 'type']));
    }

    public function simpanMid(Request $request)
    {
        $jawabans = $request->soal ?: [];
        $soals_raw = array_keys($jawabans);
        $soals = Soal::whereIn('id', $soals_raw)->get();

        $benar = 0;
        foreach ($soals as $soal) {
            if ($jawabans[$soal->id] == $soal->kunci) {
                $benar++;
            }
        }

        $jumlahPertanyaan = Materi::sum('jumlah_pertanyaan_mid');

        $nilai = (int)($benar / $jumlahPertanyaan * 100);

        Mid::insert([
            'id_user' => session('userID'),
            'nilai' => $nilai,
            'waktu' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('materi.index');
    }

    public function akhir()
    {
        if (Akhir::where(['id_user' => session('userID')])->first()) {
            return redirect()->route('materi.index')->with('alert', [
                'title' => 'ERROR !!!',
                'message' => 'Anda Sudah Ujian',
                'class' => 'error',
            ]);
        }

        $materis = Materi::all();
        $type = 'akhir';

        $soals = [];
        foreach ($materis as $materi) {
            $tempSoals = Soal::where('id_materi', $materi->id)->inRandomOrder()->limit($materi->jumlah_pertanyaan_akhir)->get();

            foreach ($tempSoals as $tempSoal) {
                $soals[] = $tempSoal;
            }
        }

        return view('materi.ujian', compact(['materi', 'soals', 'type']));
    }

    public function simpanAkhir(Request $request)
    {
        $jawabans = $request->soal ?: [];
        $soals_raw = array_keys($jawabans);
        $soals = Soal::whereIn('id', $soals_raw)->get();

        $benar = 0;
        foreach ($soals as $soal) {
            if ($jawabans[$soal->id] == $soal->kunci) {
                $benar++;
            }
        }

        $jumlahPertanyaan = Materi::sum('jumlah_pertanyaan_akhir');

        $nilai = (int)($benar / $jumlahPertanyaan * 100);

        Akhir::insert([
            'id_user' => session('userID'),
            'nilai' => $nilai,
            'waktu' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('materi.index');
    }
}
