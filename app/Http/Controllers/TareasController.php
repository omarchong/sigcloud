<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaEditRequest;
use App\Http\Requests\TareaRequest;
use App\Models\Cliente;
use App\Models\Estatutarea;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TareasController extends Controller
{

    public function index()
    {
        return view('system.tarea.index');
    }

    public function create()
    {   
        return view('system.tarea.create',[
            'usuarios' => Usuario::select('id','nombre')->get(),
            'clientes' => Cliente::select('id','nombreempresa')->get(),
            'estatutareas' => Estatutarea::select('id','nombre')->get()
          ]);
    }

    public function store(TareaRequest $request)
    {    
        /* dd($request->all()); */

        $tarea = Tarea::create($request->validated());
        return redirect()
        ->route('tareas.index');
    }


    public function edit(Tarea $tarea)
    {
        return view('system.tarea.edit', [
            'tarea' => $tarea,
            'usuarios' => Usuario::select('id','nombre')->get(),
            'clientes' => Cliente::select('id','nombreempresa')->get(),
            'estatutareas' => Estatutarea::select('id','nombre')->get(),
        ]);
        /* $tareas = Tarea::find($id);
        return view('system.tarea.edit')->with('tareas', $tareas); */  
    }

    public function update(TareaEditRequest $request, tarea $tarea)
    {   
        $tarea->update();
        return redirect()
        ->route('tareas.index')
        ->withSuccess("La tarea $tarea->nombre se actualizo exitosamente");
        /* $tareas = Tarea::find($id);
        $tareas->nombre = $request->get('nombre');
        $tareas->fecha_limite = $request->get('fecha_limite');
        $tareas->hora_limite = $request->get('hora_limite');
        $tareas->tipo_tarea = $request->get('tipo_tarea');
        $tareas->usuarios_id = $request->get('usuarios_id');
        $tareas->usuarios_id = $request->get('usuarios_id');
        $tareas->clientes_id = $request->get('clientes_id');
        $tareas->estatutareas_id = $request->get('estatutareas_id');
        $tareas->descripcion = $request->get('descripcion');
        $tareas->save();

        return redirect()->route('system.tarea.index'); */
    }

    public function destroy(Request $request)
    {
        $tarea = Tarea::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }

    public function RegistrosDatatables()
    {
        return datatables()
      ->eloquent(
        Tarea::query()
          ->with(['usuarios', 'clientes', 'estatutareas'])
      )
      ->toJson();
    }
}
