<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Pegawai;

use ADHhelper;

use DB;

class FungsiUmumController extends Controller
{

    public function index()
    {
        $fungsiUmums = Pegawai::where('tipe', 'fu')->get();

        return view('fungsiumum.index', compact(['fungsiUmums']));
    }

    public function create()
    {
        return view('fungsiumum.create', compact([]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npp' => 'required|unique:pegawai,npp',
            'nama' => 'required',
        ]);

        $data = $request->only('nama', 'npp');
        $data['tipe'] = 'fu';
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        DB::table('pegawai')->insert($data);

        return redirect()->route('fungsiumum.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $fungsiUmum = Pegawai::find($id);

        return view('fungsiumum.edit', compact(['fungsiUmum']));
    }

    public function update(Request $request, $id)
    {        
        $fungsiUmum = Pegawai::find($id);

        $request->validate([
            'npp' => 'required',
            'nama' => 'required',
        ]);

        if ($request->npp != $fungsiUmum->npp) {
            $request->validate([
                'npp' => 'unique:pegawai,npp',
            ]);
        }

        $data = $request->only('nama', 'npp');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');
        
        Pegawai::where(['id' => $id])->update($data);

        return redirect()->route('fungsiumum.index')->with('alert', [
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

        return redirect()->route('fungsiumum.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
