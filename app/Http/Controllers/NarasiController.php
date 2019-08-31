<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Narasi;
use App\Models\Materi;

use ADHhelper;

use DB;
use Validator;

class NarasiController extends Controller
{

    public function index($id_materi)
    {
        $materi = Materi::with('narasis')->find($id_materi);
        $narasis = $materi->narasis;

        return view('narasi.index', compact(['materi', 'narasis']));
    }

    public function create($id_materi)
    {
        $materi = Materi::find($id_materi);

        return view('narasi.create', compact(['materi']));
    }

    public function store(Request $request, $id_materi)
    {
        $request->validate([
            'no' => 'required',
            'isi_cerita' => 'required',
        ]);

        $data = $request->only('isi_cerita', 'no');
        $data['id_materi'] = $id_materi;

        DB::table('cerita')->insert($data);

        return redirect()->route('narasi.index', $id_materi)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $narasi = Narasi::find($id);
        $materi = $narasi->materi;

        return view('narasi.edit', compact(['narasi', 'materi']));
    }

    public function update(Request $request, $id)
    {        
        $narasi = Narasi::find($id);

        $request->validate([
            'no' => 'required',
            'isi_cerita' => 'required',
        ]);

        $data = $request->only('isi_cerita', 'no');
        $data['id_materi'] = $narasi->id_materi;

        Narasi::where(['id' => $id])->update($data);

        return redirect()->route('narasi.index', $narasi->id_materi)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        $narasi = Narasi::find($id);

        try {
            Narasi::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('narasi.index', $narasi->id_materi)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
