<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\BidangSektor;
use App\Models\Pegawai;

use ADHhelper;

class PublicAjaxController extends Controller
{

    public function getBidangSektor(Request $request)
    {
        return response()->json(BidangSektor::find($request->id));
    }

    public function getPegawai(Request $request)
    {
        return response()->json(Pegawai::find($request->id));
    }

    public function getPegawaiWithBidangSektor(Request $request)
    {
        return response()->json(Pegawai::with('bidangSektor')->find($request->id));
    }

}
