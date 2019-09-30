<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ADHhelper;

use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        return view('test.index');
    }

    public function getTableData(Request $req)
    {
        $columnModel[1] = "text1";
        $columnModel[2] = "text2";
        $columnModel[3] = "text3";

        $tests = new Test();
        $tests = $tests->where(function ($query) use ($req) {
            return $query->orWhere('text1', 'like', '%' . $req->search . '%')
                            ->orWhere('text2', 'like', '%' . $req->search . '%')
                            ->orWhere('text3', 'like', '%' . $req->search . '%');
        });
        $tests = $tests->orderBy($columnModel[$req->sorting['colNo']], $req->sorting['asc'] ? 'ASC' : 'DESC');
        $tests = $tests->paginate($req->perPage);

        return response()->json($tests);
    }


   public function store(Request $request)
    {
        $request->validate([
            'text1' => 'required',
            'text2' => 'required',
            'text3' => 'required',
        ]);
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
