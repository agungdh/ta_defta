<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\BidangSektor;

use ADHhelper;

use DB;

class BidangSektorController extends Controller
{

    public function index()
    {
        $bidangSektors = BidangSektor::all();

        return view('bidangsektor.index', compact(['bidangSektors']));
    }

    public function create()
    {
        return view('bidangsektor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bidang_sektor' => 'required',
        ]);

        $data = $request->only('bidang_sektor');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');
        
        DB::table('bidang_sektor')->insert($data);

        return redirect()->route('bidangsektor.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $bidangSektor = BidangSektor::find($id);

        return view('bidangsektor.edit', compact(['bidangSektor']));
    }

    public function update(Request $request, $id)
    {        
        $request->validate([
            'bidang_sektor' => 'required',
        ]);

        $data = $request->only('bidang_sektor');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');
        
        BidangSektor::where(['id' => $id])->update($data);

        return redirect()->route('bidangsektor.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            BidangSektor::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('bidangsektor.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
