<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\PaslonCapres;
use App\Models\Periode;

use ADHhelper;

use DB;

class PaslonCapresController extends Controller
{

    public function __construct()
    {
        $this->middleware('Menu:pasloncapres');
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
        $paslonCapresses = PaslonCapres::all();

        return view('pasloncapres.index', compact(['paslonCapresses']));
    }

    public function create()
    {
        $periodes = $this->getAllPeriodes();

        return view('pasloncapres.create', compact(['periodes']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_urut' => 'required',
            'id_periode' => 'required',
            'paslon_capres' => 'required',
            'foto' => 'image',
        ]);

        $data = $request->only('no_urut', 'paslon_capres', 'id_periode');
        
        $id = DB::table('paslon_capres')->insertGetId($data);

        $foto = $request->file('foto');
        if ($foto) {            
            $foto->move(storage_path('app/public/files/foto'), $id);
        }

        return redirect()->route('pasloncapres.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $paslonCapres = PaslonCapres::find($id);
        $periodes = $this->getAllPeriodes();

        return view('pasloncapres.edit', compact(['paslonCapres', 'periodes']));
    }

    public function update(Request $request, $id)
    {        
       $request->validate([
            'no_urut' => 'required',
            'id_periode' => 'required',
            'paslon_capres' => 'required',
            'foto' => 'image',
        ]);

        $data = $request->only('no_urut', 'paslon_capres', 'id_periode');
        
        PaslonCapres::where('id', $id)->update($data);

        $foto = $request->file('foto');
        if ($foto) {            
            $foto->move(storage_path('app/public/files/foto'), $id);
        }


        return redirect()->route('pasloncapres.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            if (file_exists(storage_path('app/public/files/foto/' . $id))) {
                unlink(storage_path('app/public/files/foto/' . $id));
            }
            PaslonCapres::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('pasloncapres.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
