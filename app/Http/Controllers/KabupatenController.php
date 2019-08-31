<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Kabupaten;

use ADHhelper;

use DB;

class KabupatenController extends Controller
{

    public function index()
    {
        $kabupatens = Kabupaten::all();

        return view('kabupaten.index', compact(['kabupatens']));
    }

    public function create()
    {
        return view('kabupaten.create', compact([]));
    }

    public function store(Request $request)
    {
        $request['durasi'] = str_replace('.', '', $request['durasi']);
        $request->validate([
            'unit' => 'required',
            'materi' => 'required',
            'deskripsi' => 'required',
            'berkas' => 'required|file|mimes:pdf',
            'durasi' => 'required|numeric|min:10',
        ]);

        $data = $request->only('unit', 'materi', 'deskripsi', 'durasi');
        
        $id_materi = DB::table('materi')->insertGetId($data);

        $berkas = $request->file('berkas');
        $id_files = DB::table('files')->insertGetId([
            'id_materi' => $id_materi,
            'filename' => $berkas->getClientOriginalName(),
        ]);

        $berkas->move(storage_path('app/public/files/berkas'), $id_files);

        return redirect()->route('kabupaten.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $materi = Kabupaten::find($id);

        return view('kabupaten.edit', compact(['materi']));
    }

    public function update(Request $request, $id)
    {        
        $materi = Kabupaten::find($id);

        $request['durasi'] = str_replace('.', '', $request['durasi']);
        $request->validate([
            'unit' => 'required',
            'materi' => 'required',
            'deskripsi' => 'required',
            'berkas' => 'file|mimes:pdf',
            'durasi' => 'required|numeric|min:10',
        ]);

        $data = $request->only('unit', 'materi', 'deskripsi', 'durasi');
        
        Kabupaten::where('id', $id)->update($data);

        $berkas = $request->file('berkas');
        if ($berkas) {
            $files = $materi->berkas;
            $files->filename = $berkas->getClientOriginalName();
            $files->save();
            
            $berkas->move(storage_path('app/public/files/berkas'), $files->id);
        }

        return redirect()->route('kabupaten.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            $berkas = Berkas::where(['id_materi' => $id])->first();   
            Berkas::where(['id_materi' => $id])->delete();   
            unlink(storage_path('app/public/files/berkas/' . $berkas->id));
            Kabupaten::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('kabupaten.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
