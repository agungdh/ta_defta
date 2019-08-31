<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ADHhelper;

use App\Models\User;
use App\Models\Narasi;
use App\Models\Soal;

use Hash;
use DB;

class TempController extends Controller
{

    public function index()
    {
    	self::urotin(120, 1);
    	self::urotin(121, 5);
    	self::urotin(122, 11);
    }

    public function sendData(Request $request)
    {
        
    }

    public function urotin($id_cerita, $no_awal)
    {
    	$soals = Soal::where('id_cerita', $id_cerita)->orderBy('id', 'asc')->get();
    	
    	$i = $no_awal;
    	foreach ($soals as $soal) {
    		$soal->no = $i;
    		$soal->save();

    		$i++;
    	}
    }

}