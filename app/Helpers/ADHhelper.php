<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Menu;
use App\Models\HakAkses;

use agungdh\Pustaka;

use DB;
use Response;
use File;

class ADHhelper extends Pustaka
{
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
