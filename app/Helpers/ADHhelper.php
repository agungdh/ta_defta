<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Menu;
use App\Models\HakAkses;
use App\Models\Kecamatan;

use agungdh\Pustaka;

use DB;
use Response;
use File;

class ADHhelper extends Pustaka
{

    public static function getUsersKecamatan() {
      return Kecamatan::where('id_kabupaten', self::getUserData()->id_kabupaten)->get();
    }

    public static function displayIdKandidat($tipePemilihan) {
        switch ($tipePemilihan) {
            case 'presiden':
              $result = 'id_paslon_capres';
              break;
            case 'dpr':
            case 'dprdk':
            case 'dprdp':
              $result = 'id_partai';
              break;
            case 'dpd':
              $result = 'id_calon_dpd';
              break;
            default:
              $result = 'Error !!!';
              break;
          }

          return $result;
    }

    public static function displayDataKandidat($tipePemilihan, $detilSuara) {
        switch ($tipePemilihan) {
            case 'presiden':
              $result = $detilSuara->paslonCapres->paslon_capres;
              break;
            case 'dpr':
            case 'dprdk':
            case 'dprdp':
              $result = $detilSuara->partai->partai;
              break;
            case 'dpd':
              $result = $detilSuara->calonDPD->nama;
              break;
            default:
              $result = 'Error !!!';
              break;
          }

          return $result;
    }

    public static function displayKandidat($tipePemilihan) {
        switch ($tipePemilihan) {
            case 'presiden':
              $result = 'Calon Presiden - Wakil Presiden';
              break;
            case 'dpr':
            case 'dprdk':
            case 'dprdp':
              $result = 'Partai';
              break;
            case 'dpd':
              $result = 'Calon DPD';
              break;
            default:
              $result = 'Error !!!';
              break;
          }

          return $result;
    }

    public static function displayTipePemilihan($tipe) {
        switch ($tipe) {
            case 'presiden':
              $result = 'Presiden';
              break;
            case 'dpr':
              $result = 'DPR';
              break;
            case 'dpd':
              $result = 'DPD';
              break;
            case 'dprdp':
              $result = 'DPRD Provinsi';
              break;
            case 'dprdk':
              $result = 'DPRD Kabupaten / Kota';
              break;
            default:
              $result = 'Error !!!';
              break;
          }

          return $result;
    }

    public static function getUserData() {
        return User::find(session('userID'));
    }

    public static function openFileWithFileName($filePath, $fileName) {
    	$file = File::get($filePath);
        $mimeType = File::mimeType($filePath);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $mimeType);
        $response->header('Content-Disposition', 'inline; filename="' . $fileName . '"');
        return $response;
    }
}
