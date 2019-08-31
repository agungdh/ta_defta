<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Kendaraan;

use ADHhelper;

use DB;

class KendaraanController extends Controller
{

    public function index()
    {
        $kendaraans = Kendaraan::all();

        return view('kendaraan.index', compact(['kendaraans']));
    }

    public function create()
    {
        return view('kendaraan.create', compact([]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|unique:kendaraan,plat_nomor',
        ]);

        $data = $request->only('deskripsi', 'plat_nomor');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        DB::table('kendaraan')->insert($data);

        return redirect()->route('kendaraan.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::find($id);

        return view('kendaraan.edit', compact(['kendaraan']));
    }

    public function update(Request $request, $id)
    {        
        $kendaraan = Kendaraan::find($id);

        $request->validate([
            'plat_nomor' => 'required',
        ]);

        if ($request->plat_nomor != $kendaraan->plat_nomor) {
            $request->validate([
                'plat_nomor' => 'unique:kendaraan,plat_nomor',
            ]);
        }

        $data = $request->only('deskripsi', 'plat_nomor');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        Kendaraan::where(['id' => $id])->update($data);

        return redirect()->route('kendaraan.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            Kendaraan::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('kendaraan.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
