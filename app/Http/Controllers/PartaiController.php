<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Partai;
use App\Models\Periode;

use ADHhelper;

use DB;

class PartaiController extends Controller
{

    public function __construct()
    {
        $this->middleware('Menu:partai');
    }

    public function getAllPeriodes()
    {
        $periodes_raw = Periode::all();
        $periodes = [];
        foreach ($periodes_raw as $item) {
            $periodes[$item->id] = "{$item->periode}";
        }

        return $periodes;
    }

    public function index()
    {
        $partais = Partai::all();

        return view('partai.index', compact(['partais']));
    }

    public function create()
    {
        $periodes = $this->getAllPeriodes();

        return view('partai.create', compact(['periodes']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partai' => 'required',
            'id_periode' => 'required',
            'logo' => 'image',
        ]);

        $data = $request->only('partai', 'id_periode');
        
        $id = DB::table('partai')->insertGetId($data);

        $logo = $request->file('logo');
        if ($logo) {            
            $logo->move(storage_path('app/public/files/logo'), $id);
        }

        return redirect()->route('partai.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $partai = Partai::find($id);
        $periodes = $this->getAllPeriodes();

        return view('partai.edit', compact(['partai', 'periodes']));
    }

    public function update(Request $request, $id)
    {        
        $request->validate([
            'partai' => 'required',
            'id_periode' => 'required',
            'logo' => 'image',
        ]);

        $data = $request->only('partai', 'id_periode');
        
        Partai::where('id', $id)->update($data);

        $logo = $request->file('logo');
        if ($logo) {            
            $logo->move(storage_path('app/public/files/logo'), $id);
        }


        return redirect()->route('partai.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            if (file_exists(storage_path('app/public/files/logo/' . $id))) {
                unlink(storage_path('app/public/files/logo/' . $id));
            }
            Partai::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('partai.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
