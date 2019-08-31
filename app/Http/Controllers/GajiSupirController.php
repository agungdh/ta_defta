<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\GajiSupir;

use ADHhelper;

use DB;
use Validator;

class GajiSupirController extends Controller
{

    public function index($id_pegawai)
    {
        $gajiSupirs = GajiSupir::where('id_pegawai', $id_pegawai)->get();

        return view('gajisupir.index', compact(['gajiSupirs', 'id_pegawai']));
    }

    public function create($id_pegawai)
    {
        return view('gajisupir.create', compact(['id_pegawai']));
    }

    public function store(Request $request, $id_pegawai)
    {
        $validator = Validator::make($request->all(), [
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:1900|max:2900',
            'gaji' => 'required',
        ]);

        if (!($validator->errors()->has('bulan') && $validator->errors()->has('tahun'))) {
            $gajiSupir = GajiSupir::where([
                'id_pegawai' => $id_pegawai,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
            ])->first();

            if ($gajiSupir) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('bulan', 'The bulan and tahun has already been taken.');
                    $validator->errors()->add('tahun', 'The bulan and tahun has already been taken.');
                });
            }
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = $request->only('bulan', 'tahun');
        $data['gaji'] = str_replace(".", "", $request->gaji);
        $data['id_pegawai'] = $id_pegawai;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');
        
        DB::table('gaji')->insert($data);

        return redirect()->route('gajisupir.index', $id_pegawai)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $gajiSupir = GajiSupir::find($id);
        $id_pegawai = $gajiSupir->id_pegawai;

        return view('gajisupir.edit', compact(['gajiSupir', 'id_pegawai']));
    }

    public function update(Request $request, $id)
    {        
        $gajiSupir = GajiSupir::find($id);
        $id_pegawai = $gajiSupir->id_pegawai;

        $validator = Validator::make($request->all(), [
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:1900|max:2900',
            'gaji' => 'required',
        ]);

        if (!($validator->errors()->has('bulan') && $validator->errors()->has('tahun'))) {
            if ($request->bulan != $gajiSupir->bulan || $request->tahun != $gajiSupir->tahun) {
                $sewaKendaraanHere = GajiSupir::where([
                    'id_pegawai' => $id_pegawai,
                    'bulan' => $request->bulan,
                    'tahun' => $request->tahun,
                ])->first();

                if ($sewaKendaraanHere) {
                    $validator->after(function ($validator) {
                        $validator->errors()->add('bulan', 'The bulan and tahun has already been taken.');
                        $validator->errors()->add('tahun', 'The bulan and tahun has already been taken.');
                    });
                }
            }
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = $request->only('bulan', 'tahun');
        $data['gaji'] = str_replace(".", "", $request->gaji);
        $data['id_pegawai'] = $id_pegawai;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        GajiSupir::where(['id' => $id])->update($data);

        return redirect()->route('gajisupir.index', $id_pegawai)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        $gajiSupir = GajiSupir::find($id);

        try {
            GajiSupir::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('gajisupir.index', $gajiSupir->id_pegawai)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
