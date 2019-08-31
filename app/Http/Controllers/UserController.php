<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

use App\Models\User;

use ADHhelper;

use Hash;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('user.index', compact(['users']));
    }

    public function create()
    {
        return view('user.create', compact([]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'level' => 'required',
            'username' => 'required|unique:user,username',
            'password' => 'required|confirmed',
        ]);

        $data = $request->only('nama', 'level', 'username', 'password');
        $data['password'] = Hash::make($request->password);

        DB::table('user')->insert($data);

        return redirect()->route('user.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Tambah Data',
            'class' => 'success',
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact(['user']));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'level' => 'required',
            'username' => [
                Rule::unique('user', 'username')->ignore($id),
            ],
            'password' => 'confirmed',
        ]);

        $data = $request->only('nama', 'level', 'username');
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($data);

        return redirect()->route('user.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Ubah Data',
            'class' => 'success',
        ]);        
    }

    public function destroy($id)
    {
        try {
            User::where(['id' => $id])->delete();
        } catch (QueryException $exception) {
            return redirect()->back()->with('alert', [
                'title' => 'ERROR !!!',
                'message' => config('app.debug') ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
            ]);        
        }

        return redirect()->route('user.index')->with('alert', [
            'title' => 'BERHASIL !!!',
            'message' => 'Berhasil Hapus Data',
            'class' => 'success',
        ]);        
    }
}
