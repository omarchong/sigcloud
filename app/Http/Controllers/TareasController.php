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
        $tareas = Tarea::paginate(5);
        return view('system.tarea.index', compact('tareas'));
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
            'estatutareas' => Estatutarea::select('id','nombre')->get()
        ]);
    }

    public function update(TareaRequest $request, Tarea $tarea)
    {   
        $tar = $request->all();
        $tarea->update($tar);
        return redirect()
        ->route('tareas.index')
        ->withSuccess("La tarea $tarea->nombre se actualizo exitosamente"); 
    }

    public function destroy(TareaRequest $request, Tarea $tarea)
    {
        $tar = $request->all();
        $tarea->delete($tar);
        return redirect ()
              ->route("tareas.index")
              ->withSuccess("La tarea se ha dado de baja exitosamente");
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
