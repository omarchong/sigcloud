<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActividadesController extends Controller
{
    public function index(Request $request)

    {
        $data['actividads']  = Actividad::all();

        return view('system.actividad.index', $data);
    }

    public function store(Request $request)
    {
        $actividad = Actividad::updateOrCreate(
            ['id' => $request->id],
            [
                'nombre' => $request->input('nombre'),
                'tipoactividad' => $request->input('tipoactividad'),
                'fecha' => $request->input('fecha'),
                'nota' => $request->input('nota')
            ]
        );
        return response()->json(['succes' => true]);
    }
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $actividad = Actividad::where($where)->first();

        return response()->json($actividad);
    }

    public function destroy(Request $request)
    {
        $actividad = Actividad::where('id', $request->id)->delete();
        return response()->json(['success' => true]);
        
    }
    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Actividad::query()
            )->tojson();
    }
}
