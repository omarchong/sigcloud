<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequest;
use App\Models\Cliente;
use App\Models\Estatutarea;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\Notificacion;
use Session;
class TareasController extends Controller
{

    public function index()
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.tarea.index');
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function create()
    {   
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.tarea.create',[
                'usuarios' => Usuario::select('id','nombre')->get(),
                'clientes' => Cliente::select('id','nombreempresa')->get(),
                'estatutareas' => Estatutarea::select('id','nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function store(TareaRequest $request)
    {    
        /* dd($request->all()); */

        $tarea = Tarea::create($request->validated());

        $usuario = $tarea->usuario;
        $usuario->notify( new Notificacion( $tarea->nombre ) );

        return redirect()
        ->route('tareas.index');
    }


    public function edit(Tarea $tarea)
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.tarea.edit', [
                'tarea' => $tarea,
                'usuarios' => Usuario::select('id','nombre')->get(),
                'clientes' => Cliente::select('id','nombreempresa')->get(),
                'estatutareas' => Estatutarea::select('id','nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function update(TareaRequest $request, Tarea $tarea)
    {   
        $tar = $request->all();
        $tarea->update($tar);
        return redirect()
        ->route('tareas.index')
        ->withSuccess("La tarea $tarea->nombre se actualizo exitosamente"); 
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()
              ->route("tareas.index")
              ->withSuccess("La tarea se eliminó correctamente");
      }

    public function RegistrosDatatables()
    {
        return datatables()
      ->eloquent(
        Tarea::query()
          ->with(['usuario', 'clientes', 'estatutareas'])
      )
      ->toJson();
    }
}
