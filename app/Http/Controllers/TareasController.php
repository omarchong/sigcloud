<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Estatutarea;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TareasController extends Controller
{

    public function index()
    {
        $estatutarea = Estatutarea::all();
        $usuario = Usuario::all();
        $cliente = Cliente::all();
        $tareas = Tarea::all();

        return view('system.tarea.index', compact("tareas", "estatutarea", "usuario", "cliente"));
    }

    public function store(Request $request)
    {

        $tarea   =   Tarea::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_limite' => $request->fecha_limite,
                'hora_limite' => $request->hora_limite,
                'tipo_tarea' => $request->tipo_tarea,
                'usuario_id' => $request->usuario_id,
                'cliente_id' => $request->cliente_id,
                'estatutarea_id' => $request->estatutarea_id,

            ]
        );

        return response()->json(['success' => true]);
    }

    public function edit(Request $request)
    {

        $where = array('id' => $request->id);
        $tarea  = Tarea::where($where)->first();

        return response()->json($tarea);
    }


    public function destroy(Request $request)
    {
        $tarea = Tarea::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }

    public function RegistroDatatables()
    {
        return datatables()
            ->eloquent(
                Tarea::query()
                    ->with(['usuario'])
                    ->with(['cliente'])
                    ->with(['estatutarea'])
            )->toJson();
    }
}
