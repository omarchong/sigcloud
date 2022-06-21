<?php

namespace App\Http\Controllers;

use App\Events\TareaEvent;
use App\Http\Requests\TareaRequest;
use App\Models\Cliente;
use App\Models\Estatutarea;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\Notificacion;
use Illuminate\Support\Facades\Auth;
use Session;
class TareasController extends Controller
{

    public function index()
    {
        


        /* $usuario=Usuario::find(1);

        foreach ($usuario->unreadNotifications as $notification) {
            echo $notification->count();
        } */
        /* $prueba = Usuario::find(1);
         $prueba->unreadNotifications->count();
         
         dd($prueba); */
        /* dd(auth()->usuario()); */
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>"")
        {
          $notificacionusuario = Usuario::find($sessionid);

            $tareas = Tarea::all();
            /* Mostrar las notificaciones que tiene el usuario  */
            /* $usuario=Usuario::find(1);   
            if (count($usuario->unreadNotifications)){
                
            } */
            return view('system.tarea.index', compact('tareas', 'notificacionusuario'));
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function create()
    {   
        /* Mostrar las notificaciones que tiene el usuario  */
        /* $usuario=Usuario::find(1);   
        if (count($usuario->unreadNotifications)){
             {{count($usuario->unreadNotifications);}}
        } */
        
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>"")
        {
          $notificacionusuario = Usuario::find($sessionid);

            return view('system.tarea.create', compact('notificacionusuario'),[
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
        $tarea = Tarea::create($request->validated());

        /* Usuario::all()
        ->except($tarea->usuario_id)
        ->each(function(Usuario $usuario) use ($tarea){
            $usuario->notify(new Notificacion($tarea));
        });  */

        
        /* event(new TareaEvent($tarea)); */
        
        self::mi_tarea_notifications($tarea);
        
        return redirect()
        ->route('tareas.index')
        ->withSuccess("La tarea $tarea->nombre se guardo correctamente");

    }

    public function mi_tarea_notifications($tarea)
    {
        /* Buscar al usuario asignado la notificacion */
        /* $prueba = Usuario::all()->where("id","=", $tarea->usuario_id);
        dd($prueba); */

        /* buscar al usuario y mostrar la notificacion que tiene */
         /* $prueba = Usuario::find(1);
         $prueba->unreadNotifications->count();
         
         dd($prueba); */

        event(new TareaEvent($tarea));
        /* Usuario::all()
        ->each(function(Usuario $usuario) use ($tarea){
            $usuario->notify(new Notificacion($tarea));
        }); */
        /* dd($prueba); */
    }


    public function edit(Tarea $tarea)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>"")
        {
          $notificacionusuario = Usuario::find($sessionid);

            return view('system.tarea.edit', compact('notificacionusuario') ,[
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

    public function destroy_tarea($id)
    {
        Tarea::find($id)->delete();
        return response()->json(['success' => 'Tarea borrado']);
    }

    public function RegistrosDatatables()
    {
        $tareas = Tarea::latest()->get();
        return datatables()
            ->eloquent(
                Tarea::query()
                ->with(['usuario', 'clientes', 'estatutareas'])
            )
            ->toJson();
    }
    
}
