<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Pemilihan;
use App\Models\SuaraPemilihan;
use App\Models\DetilSuaraPemilihan;
use App\Models\Kecamatan;

use ADHhelper;

use DB;
use Validator;

class DetilSuaraController extends Controller
{

    public function index($id_suara_pemilihan)
    {
        $suara = SuaraPemilihan::with('pemilihan', 'detilSuaras', 'kecamatan')->find($id_suara_pemilihan);
        $detilSuaras = $suara->detilSuaras;
        $pemilihan = $suara->pemilihan;

        return view('detilsuara.index', compact(['suara', 'detilSuaras', 'pemilihan']));
    }

    public function create($id_suara_pemilihan)
    {
        $suara = SuaraPemilihan::with('pemilihan', 'kecamatan')->find($id_suara_pemilihan);
        $pemilihan = $suara->pemilihan;

        return view('detilsuara.create', compact(['suara', 'pemilihan']));
    }

    public function store(Request $request, $id_suara_pemilihan)
    {
        $suara = SuaraPemilihan::with('pemilihan', 'kecamatan')->find($id_suara_pemilihan);
        $pemilihan = $suara->pemilihan;

        $validatorData = [
            'jumlah' => 'required',
        ];

        switch ($pemilihan->tipe) {
            case 'presiden':
              $validatorData['id_paslon_capres'] = 'required';
              break;
            case 'dpr':
            case 'dprdk':
            case 'dprdp':
              $validatorData['id_partai'] = 'required';
              break;
            case 'dpd':
              $validatorData['id_calon_dpd'] = 'required';
              break;
            default:
              $result = 'Error !!!';
              break;
        }

        $validator = Validator::make($request->all(), $validatorData);

        $pemilihanCheck = DetilSuaraPemilihan::where([
            'id_paslon_capres' => $request->id_paslon_capres,
            'id_partai' => $request->id_partai,
            'id_calon_dpd' => $request->id_calon_dpd,
            'id_suara_pemilihan' => $id_suara_pemilihan,
        ])->first();

        if ($pemilihanCheck) {
            $validator->after(function ($validator) {
                $validator->errors()->add('id_paslon_capres', 'The id_paslon_capres already been taken.');
                $validator->errors()->add('id_partai', 'The id_partai already been taken.');
                $validator->errors()->add('id_calon_dpd', 'The id_calon_dpd already been taken.');
            });
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = $request->only('jumlah', 'id_paslon_capres', 'id_partai', 'id_calon_dpd');
        $data['id_suara_pemilihan'] = $id_suara_pemilihan;
        $data['jumlah'] = str_replace(".", "", $request->jumlah);
        
        DB::table('detil_suara_pemilihan')->insert($data);
       
        return redirect()->route('detilsuara.index', $id_suara_pemilihan)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $suara = SuaraPemilihan::find($id);
        $pemilihan = $suara->pemilihan;
        $kecamatans = $this->getUsersKecamatan();

        return view('detilsuara.edit', compact(['suara', 'pemilihan', 'kecamatans']));
    }

    public function update(Request $request, $id)
    {        
        $suara = SuaraPemilihan::find($id);

        $validator = Validator::make($request->all(), [
            'id_kecamatan' => 'required',
            'jumlah_kelurahan' => 'required',
            'jumlah_tps' => 'required',
            'jumlah_pemilih' => 'required',
            'jumlah_suara_tidak_sah' => 'required',
        ]);

        if ($request->id_kecamatan != $suara->id_kecamatan) {
            $suaraHere = SuaraPemilihan::where([
                'id_kecamatan' => $request->id_kecamatan,
                'id_suara_pemilihan' => $suara->id_suara_pemilihan,
            ])->first();

            if ($suaraHere) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('id_kecamatan', 'The Suara for this Kecamatan and Pemilihan already been taken.');
                });
            }

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
        }

        $data = $request->only('id_kecamatan', 'jumlah_kelurahan', 'jumlah_tps', 'jumlah_pemilih', 'jumlah_suara_tidak_sah');
        $data['id_suara_pemilihan'] = $suara->id_suara_pemilihan;
        $data['jumlah_kelurahan'] = str_replace(".", "", $request->jumlah_kelurahan);
        $data['jumlah_tps'] = str_replace(".", "", $request->jumlah_tps);
        $data['jumlah_pemilih'] = str_replace(".", "", $request->jumlah_pemilih);
        $data['jumlah_suara_tidak_sah'] = str_replace(".", "", $request->jumlah_suara_tidak_sah);
        
        SuaraPemilihan::where('id', $id)->update($data);

        return redirect()->route('detilsuara.index', $suara->id_suara_pemilihan)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        $suaraPemilihan = SuaraPemilihan::find($id);

        try {
            SuaraPemilihan::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('detilsuara.index', $suaraPemilihan->id_suara_pemilihan)->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
