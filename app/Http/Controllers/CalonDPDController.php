<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\CalonDPD;
use App\Models\Partai;
use App\Models\Periode;

use ADHhelper;

use DB;

class CalonDPDController extends Controller
{

    public function __construct()
    {
        $this->middleware('Menu:calondpd');
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
        $calonDPDs = CalonDPD::with('partai')->get();

        return view('calondpd.index', compact(['calonDPDs']));
    }

    public function getAllPartais()
    {
        $partais_raw = Partai::all();
        $partais = [];
        foreach ($partais_raw as $item) {
            $partais[$item->id] = "{$item->partai}";
        }

        return $partais;
    }

    public function create()
    {
        $partais = $this->getAllPartais();
        $periodes = $this->getAllPeriodes();

        return view('calondpd.create', compact(['periodes', 'partais']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_periode' => 'required',
        ]);

        $data = $request->only('nama', 'id_partai', 'id_periode');
        
        DB::table('calon_dpd')->insert($data);

        return redirect()->route('calondpd.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $calonDPD = CalonDPD::find($id);
        $partais = $this->getAllPartais();
        $periodes = $this->getAllPeriodes();

        return view('calondpd.edit', compact(['periodes', 'calonDPD', 'partais']));
    }

    public function update(Request $request, $id)
    {        
        $request->validate([
            'nama' => 'required',
            'id_periode' => 'required',
        ]);

        $data = $request->only('nama', 'id_partai', 'id_periode');
        
        CalonDPD::where('id', $id)->update($data);

        return redirect()->route('calondpd.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            CalonDPD::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('calondpd.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
