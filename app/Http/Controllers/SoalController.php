<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Soal;
use App\Models\Narasi;

use ADHhelper;

use DB;
use Validator;

class SoalController extends Controller
{

    public function index($id_cerita)
    {
        $narasi = Narasi::with('soals')->find($id_cerita);
        $materi = $narasi->materi;
        $soals = $narasi->soals;

        return view('soal.index', compact(['narasi', 'materi', 'soals']));
    }

    public function create($id_cerita)
    {
        $narasi = Narasi::find($id_cerita);
        $materi = $narasi->materi;
        $kuncis = [
            'a' => 'A',
            'b' => 'B',
            'c' => 'C',
            'd' => 'D',
            'e' => 'E',
        ];

        return view('soal.create', compact(['materi', 'kuncis', 'narasi']));
    }

    public function store(Request $request, $id_cerita)
    {
        $cerita = Narasi::find($id_cerita);

        $request->validate([
            'no' => 'required',
            'pertanyaan' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
            'jawaban_e' => 'required',
            'kunci' => 'required',
        ]);

        $data = $request->only('pertanyaan','jawaban_a','jawaban_b','jawaban_c','jawaban_d','jawaban_e','kunci','no');
        $data['id_cerita'] = $id_cerita;
        $data['id_materi'] = $cerita->id_materi;
        
        DB::table('soal')->insert($data);

        return redirect()->route('soal.index', $id_cerita)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $soal = Soal::find($id);
        $narasi = $soal->narasi;
        $materi = $narasi->materi;
        $kuncis = [
            'a' => 'A',
            'b' => 'B',
            'c' => 'C',
            'd' => 'D',
            'e' => 'E',
        ];

        return view('soal.edit', compact(['soal', 'materi', 'kuncis', 'narasi']));
    }

    public function update(Request $request, $id)
    {        
        $soal = Soal::find($id);

       $request->validate([
            'no' => 'required',
            'pertanyaan' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
            'jawaban_e' => 'required',
            'kunci' => 'required',
        ]);

        $data = $request->only('pertanyaan','jawaban_a','jawaban_b','jawaban_c','jawaban_d','jawaban_e','kunci','no');
        $data['id_cerita'] = $soal->id_cerita;
        $data['id_materi'] = $soal->narasi->id_materi;

        Soal::where(['id' => $id])->update($data);

        return redirect()->route('soal.index', $soal->id_cerita)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        $soal = Soal::find($id);

        try {
            Soal::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('soal.index', $soal->id_cerita)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
