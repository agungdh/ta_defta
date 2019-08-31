<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\User;

use Hash;
use ADHhelper;

class MainController extends Controller
{
    function profil() {
    	$profil = ADHhelper::getUserData();

		return view('template.profil', compact(['profil']));
	}

    function saveProfil(Request $request) {
    	$request->validate([
    		'password' => 'required|confirmed',
    	]);
    	
    	$datas = [];
		$datas['password'] = Hash::make($request->password);


		User::where(['id' => session('userID')])->update($datas);

		return redirect()->route('main.profil')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Profil',
            'class' => 'success',
        ]);
	}

    function index() {
		if (session('login') == true) {
			return view('materi.depan');
		} else {
			return view('template.login');
		}
	}

	function login(Request $request) {
		$user = User::where(['username' => $request->username])->first();
		if ($user != null && Hash::check($request->password, $user->password)) {
			$userData = [];
			$userData['userID'] = $user->id;
			$userData['login'] = true;

			session($userData);

			return redirect()->route('main.index');
		} else {
			return redirect()->route('main.index')->with('alert', [
                'title' => 'GAGAL !!!',
                'message' => 'Username atau Password Salah !!!',
                'class' => 'error',
            ]);
		}
	}

	function logout() {
		session()->flush();

		return redirect()->route('main.index');
	}
}
