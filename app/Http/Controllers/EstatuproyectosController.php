<?php

namespace App\Http\Controllers;

use App\Models\Estatuproyecto;
use Illuminate\Http\Request;

class EstatuproyectosController extends Controller
{
    public function index()
    {
        $data['estatuproyectos'] = Estatuproyecto::all();

        return view('system.estatuproyecto.index', $data);
    }

    public function store(Request $request)
    {

        $estatuproyecto   =   Estatuproyecto::updateOrCreate(
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
        $estatuproyecto  = Estatuproyecto::where($where)->first();

        return response()->json($estatuproyecto);
    }


    public function destroy(Request $request)
    {
        $estatuproyecto = Estatuproyecto::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
