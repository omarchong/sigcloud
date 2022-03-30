<?php

namespace App\Http\Controllers;

use App\Models\Estatucotizacion;
use Illuminate\Http\Request;

class EstatuscotizacionController extends Controller
{
    public function index()
    {
        $data['estatucotizacions'] = Estatucotizacion::all();

        return view('system.estatucotizacion.index', $data);
    }

    public function store(Request $request)
    {

        $estatucotizacion   =   estatucotizacion::updateOrCreate(
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
        $estatucotizacion  = estatucotizacion::where($where)->first();

        return response()->json($estatucotizacion);
    }


    public function destroy(Request $request)
    {
        $estatucotizacion = estatucotizacion::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
