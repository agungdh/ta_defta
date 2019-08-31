<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Pegawai;

use ADHhelper;

use DB;

class SupirController extends Controller
{

    public function index()
    {
        $supirs = Pegawai::where('tipe', 'pg')->get();

        return view('supir.index', compact(['supirs']));
    }

    public function create()
    {
        return view('supir.create', compact([]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npp' => 'required|unique:pegawai,npp',
            'nama' => 'required',
        ]);

        $data = $request->only('nama', 'npp');
        $data['tipe'] = 'pg';
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        DB::table('pegawai')->insert($data);

        return redirect()->route('supir.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $supir = Pegawai::find($id);

        return view('supir.edit', compact(['supir']));
    }

    public function update(Request $request, $id)
    {        
        $supir = Pegawai::find($id);

        $request->validate([
            'npp' => 'required',
            'nama' => 'required',
        ]);

        if ($request->npp != $supir->npp) {
            $request->validate([
                'npp' => 'unique:pegawai,npp',
            ]);
        }

        $data = $request->only('nama', 'npp');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        Pegawai::where(['id' => $id])->update($data);

        return redirect()->route('supir.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            Pegawai::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('supir.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
