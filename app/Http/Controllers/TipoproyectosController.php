<?php

namespace App\Http\Controllers;

use App\Models\Tipoproyecto;
use Illuminate\Http\Request;

class TipoproyectosController extends Controller
{
    public function index()
    {
        $data['tipoproyectos'] = Tipoproyecto::all();

        return view('system.tipoproyecto.index', $data);
    }

    public function store(Request $request)
    {

        $tipoproyecto  =  Tipoproyecto::updateOrCreate(
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
        $tipoproyecto  = Tipoproyecto::where($where)->first();

        return response()->json($tipoproyecto);
    }


    public function destroy(Request $request)
    {
        $tipoproyecto = Tipoproyecto::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
