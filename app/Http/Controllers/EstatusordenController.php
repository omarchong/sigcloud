<?php

namespace App\Http\Controllers;

use App\Models\Estatuorden;
use Illuminate\Http\Request;

class EstatusordenController extends Controller
{
    public function index()
    {
        $data['estatuordens'] = Estatuorden::all();

        return view('system.estatuorden.index', $data);
    }

    public function store(Request $request)
    {

        $estatuorden   =   estatuorden::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nombre' => $request->nombre,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function edit(Request $request)
    {

        $where = array('id' => $request->id);
        $estatuorden  = estatuorden::where($where)->first();

        return response()->json($estatuorden);
    }


    public function destroy(Request $request)
    {
        $estatuorden = estatuorden::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
    public function RegistrosDatatables()
    {
        return datatables()
        ->eloquent(
            Estatuorden::query()
        )->toJson();
    }
}
