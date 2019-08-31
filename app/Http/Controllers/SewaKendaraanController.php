<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\SewaKendaraan;

use ADHhelper;

use DB;
use Validator;

class SewaKendaraanController extends Controller
{

    public function index($id_kendaraan)
    {
        $sewaKendaraans = SewaKendaraan::where('id_kendaraan', $id_kendaraan)->get();

        return view('sewakendaraan.index', compact(['sewaKendaraans', 'id_kendaraan']));
    }

    public function create($id_kendaraan)
    {
        return view('sewakendaraan.create', compact(['id_kendaraan']));
    }

    public function store(Request $request, $id_kendaraan)
    {
        $validator = Validator::make($request->all(), [
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:1900|max:2900',
            'sewa' => 'required',
        ]);

        if (!($validator->errors()->has('bulan') && $validator->errors()->has('tahun'))) {
            $sewaKendaraan = SewaKendaraan::where([
                'id_kendaraan' => $id_kendaraan,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
            ])->first();

            if ($sewaKendaraan) {
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
        $data['sewa'] = str_replace(".", "", $request->sewa);
        $data['id_kendaraan'] = $id_kendaraan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');
        
        DB::table('sewa')->insert($data);

        return redirect()->route('sewakendaraan.index', $id_kendaraan)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $sewaKendaraan = SewaKendaraan::find($id);
        $id_kendaraan = $sewaKendaraan->id_kendaraan;

        return view('sewakendaraan.edit', compact(['sewaKendaraan', 'id_kendaraan']));
    }

    public function update(Request $request, $id)
    {        
        $sewaKendaraan = SewaKendaraan::find($id);
        $id_kendaraan = $sewaKendaraan->id_kendaraan;

        $validator = Validator::make($request->all(), [
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:1900|max:2900',
            'sewa' => 'required',
        ]);

        if (!($validator->errors()->has('bulan') && $validator->errors()->has('tahun'))) {
            if ($request->bulan != $sewaKendaraan->bulan || $request->tahun != $sewaKendaraan->tahun) {
                $sewaKendaraanHere = SewaKendaraan::where([
                    'id_kendaraan' => $id_kendaraan,
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
        $data['sewa'] = str_replace(".", "", $request->sewa);
        $data['id_kendaraan'] = $id_kendaraan;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        SewaKendaraan::where(['id' => $id])->update($data);

        return redirect()->route('sewakendaraan.index', $id_kendaraan)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        $sewaKendaraan = SewaKendaraan::find($id);

        try {
            SewaKendaraan::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('sewakendaraan.index', $sewaKendaraan->id_kendaraan)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
