<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Pemakaian;
use App\Models\Pegawai;
use App\Models\Kendaraan;

use DB;

use ADHhelper;

class PemakaianController extends Controller
{

    public function index()
    {
        $pemakaians = Pemakaian::all();

        return view('pemakaian.index', compact(['pemakaians']));
    }

    public function create()
    {
        extract($this->initData());

        return view('pemakaian.create', compact(['pegawais', 'keperluans', 'tujuans', 'ketersediaanKendaraans', 'kendaraans', 'pengemudis', 'bbms', 'kondisis', 'petugasJagas']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required',
            'keperluan' => 'required',
            'tanggal_permohonan' => 'required',
            'tujuan' => 'required',
            'luar_kota' => 'required_if:tujuan,l',
            'rencana_mulai' => 'required',
            'rencana_kembali' => 'required',
            'id_pegawai_atasan_langsung' => 'required',
            'ketersediaan_kendaraan' => 'required',
            'biaya_tidak_tersedia_kendaraan' => 'required_if:ketersediaan_kendaraan,tt',
            'id_kendaraan' => 'required_if:ketersediaan_kendaraan,t',
            'id_pengemudi' => 'required_if:ketersediaan_kendaraan,t',
            'tanggal_persetujuan_fungsi_umum' => 'required_if:ketersediaan_kendaraan,t',
            'id_pegawai_fungsi_umum' => 'required_if:ketersediaan_kendaraan,t',
            'realisasi_mulai_kondisi' => 'required',
            'realisasi_mulai_waktu' => 'required',
            'realisasi_mulai_bbm' => 'required',
            'realisasi_mulai_km' => 'required',
            'id_pegawai_realisasi_mulai_petugas_jaga' => 'required',
            'realisasi_kembali_kondisi' => 'required',
            'realisasi_kembali_waktu' => 'required',
            'realisasi_kembali_bbm' => 'required',
            'realisasi_kembali_km' => 'required',
            'id_pegawai_realisasi_kembali_petugas_jaga' => 'required',
            'pengisian_bbm_spbu' => 'required',
            'pengisian_bbm_liter' => 'required',
            'pengisian_bbm_biaya' => 'required',
            'no_voucher' => 'required',
            'jarak' => 'required',
        ]);

        $data = $request->only(
            'id_pegawai', 'keperluan', 'keterangan', 'tujuan', 'luar_kota', 'id_pegawai_atasan_langsung', 'ketersediaan_kendaraan', 'id_kendaraan', 'id_pengemudi', 'id_pegawai_fungsi_umum', 'catatan', 'realisasi_mulai_kondisi', 'id_pegawai_realisasi_mulai_petugas_jaga', 'realisasi_kembali_kondisi', 'id_pegawai_realisasi_kembali_petugas_jaga', 'pengisian_bbm_spbu', 'no_voucher', 'realisasi_mulai_bbm', 'realisasi_kembali_bbm'
        );

        $data['tanggal_permohonan'] = ADHhelper::parseTanggalIndo($request->tanggal_permohonan);
        $data['tanggal_persetujuan_fungsi_umum'] = ADHhelper::parseTanggalIndo($request->tanggal_persetujuan_fungsi_umum);
        $data['realisasi_mulai_waktu'] = ADHhelper::parseTanggalWaktuIndo($request->realisasi_mulai_waktu);
        $data['realisasi_kembali_waktu'] = ADHhelper::parseTanggalWaktuIndo($request->realisasi_kembali_waktu);
        $data['rencana_mulai'] = ADHhelper::parseTanggalWaktuIndo($request->rencana_mulai);
        $data['rencana_kembali'] = ADHhelper::parseTanggalWaktuIndo($request->rencana_kembali);
        $data['jarak'] = str_replace(".", "", $request->jarak);
        $data['pengisian_bbm_biaya'] = str_replace(".", "", $request->pengisian_bbm_biaya);
        $data['pengisian_bbm_liter'] = str_replace(".", "", $request->pengisian_bbm_liter);
        $data['biaya_tidak_tersedia_kendaraan'] = $request->biaya_tidak_tersedia_kendaraan != '' ? str_replace(".", "", $request->biaya_tidak_tersedia_kendaraan) : null;
        $data['realisasi_mulai_km'] = str_replace(".", "", $request->realisasi_mulai_km);
        $data['realisasi_kembali_km'] = str_replace(".", "", $request->realisasi_mulai_km);

        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = session('userID');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        DB::table('pemakaian')->insert($data);

        return redirect()->route('pemakaian.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        extract($this->initData());

        $pemakaian = Pemakaian::find($id);

        return view('pemakaian.edit', compact(['pegawais', 'keperluans', 'tujuans', 'ketersediaanKendaraans', 'kendaraans', 'pengemudis', 'bbms', 'kondisis', 'pemakaian', 'petugasJagas']));
    }

    public function update(Request $request, $id)
    {        
        $request->validate([
            'id_pegawai' => 'required',
            'keperluan' => 'required',
            'tanggal_permohonan' => 'required',
            'tujuan' => 'required',
            'luar_kota' => 'required_if:tujuan,l',
            'rencana_mulai' => 'required',
            'rencana_kembali' => 'required',
            'id_pegawai_atasan_langsung' => 'required',
            'ketersediaan_kendaraan' => 'required',
            'biaya_tidak_tersedia_kendaraan' => 'required_if:ketersediaan_kendaraan,tt',
            'id_kendaraan' => 'required_if:ketersediaan_kendaraan,t',
            'id_pengemudi' => 'required_if:ketersediaan_kendaraan,t',
            'tanggal_persetujuan_fungsi_umum' => 'required_if:ketersediaan_kendaraan,t',
            'id_pegawai_fungsi_umum' => 'required_if:ketersediaan_kendaraan,t',
            'realisasi_mulai_kondisi' => 'required',
            'realisasi_mulai_waktu' => 'required',
            'realisasi_mulai_bbm' => 'required',
            'realisasi_mulai_km' => 'required',
            'id_pegawai_realisasi_mulai_petugas_jaga' => 'required',
            'realisasi_kembali_kondisi' => 'required',
            'realisasi_kembali_waktu' => 'required',
            'realisasi_kembali_bbm' => 'required',
            'realisasi_kembali_km' => 'required',
            'id_pegawai_realisasi_kembali_petugas_jaga' => 'required',
            'pengisian_bbm_spbu' => 'required',
            'pengisian_bbm_liter' => 'required',
            'pengisian_bbm_biaya' => 'required',
            'no_voucher' => 'required',
            'jarak' => 'required',
        ]);

        $data = $request->only(
            'id_pegawai', 'keperluan', 'keterangan', 'tujuan', 'luar_kota', 'id_pegawai_atasan_langsung', 'ketersediaan_kendaraan', 'id_kendaraan', 'id_pengemudi', 'id_pegawai_fungsi_umum', 'catatan', 'realisasi_mulai_kondisi', 'id_pegawai_realisasi_mulai_petugas_jaga', 'realisasi_kembali_kondisi', 'id_pegawai_realisasi_kembali_petugas_jaga', 'pengisian_bbm_spbu', 'no_voucher', 'realisasi_mulai_bbm', 'realisasi_kembali_bbm'
        );

        $data['tanggal_permohonan'] = ADHhelper::parseTanggalIndo($request->tanggal_permohonan);
        $data['tanggal_persetujuan_fungsi_umum'] = ADHhelper::parseTanggalIndo($request->tanggal_persetujuan_fungsi_umum);
        $data['realisasi_mulai_waktu'] = ADHhelper::parseTanggalWaktuIndo($request->realisasi_mulai_waktu);
        $data['realisasi_kembali_waktu'] = ADHhelper::parseTanggalWaktuIndo($request->realisasi_kembali_waktu);
        $data['rencana_mulai'] = ADHhelper::parseTanggalWaktuIndo($request->rencana_mulai);
        $data['rencana_kembali'] = ADHhelper::parseTanggalWaktuIndo($request->rencana_kembali);
        $data['jarak'] = str_replace(".", "", $request->jarak);
        $data['pengisian_bbm_biaya'] = str_replace(".", "", $request->pengisian_bbm_biaya);
        $data['pengisian_bbm_liter'] = str_replace(".", "", $request->pengisian_bbm_liter);
        $data['biaya_tidak_tersedia_kendaraan'] = $request->biaya_tidak_tersedia_kendaraan != '' ? str_replace(".", "", $request->biaya_tidak_tersedia_kendaraan) : null;
        $data['realisasi_mulai_km'] = str_replace(".", "", $request->realisasi_mulai_km);
        $data['realisasi_kembali_km'] = str_replace(".", "", $request->realisasi_mulai_km);

        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = session('userID');

        Pemakaian::where(['id' => $id])->update($data);

        return redirect()->route('pemakaian.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {     
        try {
            Pemakaian::where(['id' => $id])->delete();   
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('pemakaian.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }

    private function initData()
    {
        $pegawais_raw = Pegawai::with('bidangSektor')->orWhere('tipe', 'pw')->orWhere('tipe', 'fu')->get();
        $pegawais = [];
        foreach ($pegawais_raw as $item) {
            $pegawais[$item->id] = "{$item->npp} - {$item->nama}";
        }

        $kendaraans_raw = Kendaraan::all();
        $kendaraans = [];
        foreach ($kendaraans_raw as $item) {
            $kendaraans[$item->id] = "{$item->plat_nomor} - {$item->deskripsi}";
        }

        $pengemudis_raw = Pegawai::where('tipe', 'pg')->get();
        $pengemudis = [];
        foreach ($pengemudis_raw as $item) {
            $pengemudis[$item->id] = "{$item->npp} - {$item->nama}";
        }

        $petugasJagas_raw = Pegawai::where('tipe', 'pj')->get();
        $petugasJagas = [];
        foreach ($petugasJagas_raw as $item) {
            $petugasJagas[$item->id] = "{$item->npp} - {$item->nama}";
        }

        $keperluans = [
            'd' => 'Dinas',
            'p' => 'Pribadi',
        ];

        $tujuans = [
            'd' => 'Dalam Kota',
            'l' => 'Luar Kota',
        ];

        $ketersediaanKendaraans = [
            't' => 'Tersedia',
            'tt' => 'Tidak Tersedia',
        ];

        $bbms = [
            'e' => 'E',
            '1/4' => '1/4',
            '1/2' => '1/2',
            '3/4' => '3/4',
            'f' => 'F',
        ];

        $kondisis = [
            'b' => 'Baik',
            't' => 'Tidak Baik',
        ];

        return compact(['pegawais', 'keperluans', 'tujuans', 'ketersediaanKendaraans', 'kendaraans', 'pengemudis', 'bbms', 'kondisis', 'petugasJagas']);
    }
}
