<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Estatutarea;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TareasController extends Controller
{
  
  public function index()
  {
    return view("system.tareas.index");
  }

  public function store(Request $request)

  {
    
    $tarea = Tarea::updateOrCreate(
      [
        'id' => $request->id,
      ],
      [
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'fecha_limite'  => $request->fecha_limite,
        'hora_limite' => $request->hora_limite,
        'tipo_tarea' => $request->tipo_tarea,
        'estatutareas' => Estatutarea::select('id', 'nombre')->get(),
        'usuarios' => Usuario::select('id', 'nombre')->get(),
        'citas' => Cita::select('id', 'nombre')->get()
      ],
    );
    return response()->json(['success' => true]);
  }

  public function edit(Request $request)
  {
    $where = array('id' => $request->id);
    $tarea = Tarea::where($where)->first();
    return response()->json($tarea);
  }

  public function RegistrosDatatables()
  {
    return datatables()
      ->eloquent(
          Tarea::query()
      )
      ->toJson();
      
  }

  public function destroy(Request $request)
  {
    $tarea = Tarea::where('id', $request->id)->delete();
    return response()->json(['success' => true]);
  }
}
