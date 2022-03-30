<?php

namespace App\Http\Controllers;

use App\Models\Estatuservicio;
use Illuminate\Http\Request;

class EstatuserviciosController extends Controller
{
    public function index()
    {
        $data['estatuservicios'] = Estatuservicio::all();

        return view('system.estatuservicio.index', $data);
    }

    public function store(Request $request)
    {

        $estatuservicio   =   estatuservicio::updateOrCreate(
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
        $estatuservicio  = estatuservicio::where($where)->first();

        return response()->json($estatuservicio);
    }


    public function destroy(Request $request)
    {
        $estatuservicio = estatuservicio::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
