<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Pegawai;
use App\Models\BidangSektor;

use ADHhelper;

use DB;

class PegawaiController extends Controller
{

    private function getAllBidangSektors() {
        $bidangSektors_raw = BidangSektor::all();
        $bidangSektors = [];
        foreach ($bidangSektors_raw as $item) {
            $bidangSektors[$item->id] = "{$item->bidang_sektor}";
        }

        return $bidangSektors;
    }

    public function index()
    {
        $pegawais = Pegawai::with('bidangSektor')->where('tipe', 'pw')->get();

        return view('pegawai.index', compact(['pegawais']));
    }

    public function create()
    {
        $bidangSektors = $this->getAllBidangSektors();

        return view('pegawai.create', compact(['bidangSektors']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npp' => 'required|unique:pegawai,npp',
            'nama' => 'required',
            'id_bidang_sektor' => 'required',
        ]);

        $data = $request->only('npp', 'nama', 'id_bidang_sektor');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        DB::table('pegawai')->insert($data);

        return redirect()->route('pegawai.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);

        $bidangSektors = $this->getAllBidangSektors();

        return view('pegawai.edit', compact(['pegawai', 'bidangSektors']));
    }

    public function update(Request $request, $id)
    {        
        $pegawai = Pegawai::find($id);

        $request->validate([
            'npp' => 'required',
            'nama' => 'required',
            'id_bidang_sektor' => 'required',
        ]);

        if ($request->npp != $pegawai->npp) {
            $request->validate([
                'npp' => 'unique:pegawai,npp',
            ]);
        }

        $data = $request->only('bidang_sektor', 'npp', 'nama');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        Pegawai::where(['id' => $id])->update($data);

        return redirect()->route('pegawai.index')->with('alert', [
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

        return redirect()->route('pegawai.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
