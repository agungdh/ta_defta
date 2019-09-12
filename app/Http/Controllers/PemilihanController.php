<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Pemilihan;

use ADHhelper;

use DB;

class PemilihanController extends Controller
{

    public function index()
    {
        $pemilihans = Pemilihan::all();

        return view('pemilihan.index', compact(['pemilihans']));
    }

    public function create()
    {
        return view('pemilihan.create', compact([]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required',
        ]);

        $data = $request->only('periode');
        
        DB::table('periode')->insert($data);

        return redirect()->route('pemilihan.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $periode = Pemilihan::find($id);

        return view('pemilihan.edit', compact(['periode']));
    }

    public function update(Request $request, $id)
    {        
        $request->validate([
            'periode' => 'required',
        ]);

        $data = $request->only('periode');
        
        Pemilihan::where('id', $id)->update($data);

        return redirect()->route('pemilihan.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            Pemilihan::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('pemilihan.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
