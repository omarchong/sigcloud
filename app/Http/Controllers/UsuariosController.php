<?php

namespace App\Http\Controllers;


use App\Models\Departamento;
use App\Models\Usuario;
use App\Notifications\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UsuariosController extends Controller
{
    /* retorna ala vista inicial del modulo usuarios */
    public function index()
    {
       /*  dd(auth()->user()); */
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if ($sessionusuario <> "") {
        /* Variable notificacion */
        $notificacionusuario = Usuario::find($sessionid);

        /* Fin de la Variable notificacion */
            return view('system.usuarios.index', compact('notificacionusuario'));
        } else {
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    /* retorna a la vista de crear usuario */
    public function create()
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');

        if ($sessionusuario <> "") {
        /* Variable notificacion */
        $notificacionusuario = Usuario::find($sessionid);
        /* Fin de la Variable notificacion */
            return view('system.usuarios.create',  compact('notificacionusuario'), [
                'departamentos' => Departamento::select('id', 'nombre')->get()
            ]);
        } else {
            Session::flash('mensaje', 'Inicar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    /* crea un usuario */
    public function store(Request $request)
    {
        /* dd($request->all()); */
        $request->validate([
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'telefono' => 'required',
            'usuario' => 'required|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required',
            'contrasena_confirmar' => 'required',
            'departamento_id' => 'required',
            'imagen' => 'image|mimes:jpg,png,jpeg|max:1024',
            'estatus' => 'required',
        ]);

        $usuario = $request->all();

        $file = $request->file('imagen');
        if($file<>"")
        {
            $imagen = $file->getClientOriginalName();
            $imagen2 = date("YmdHis") . $imagen;
            \Storage::disk('local')->put($imagen2, \File::get($file));
        }
        else{
            $imagen2 = "sinfoto.jpeg";
        }

        /* if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenUsuario = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenUsuario);
            $usuario['imagen'] = "$imagenUsuario";
        } */
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'app' => $request->app,
            'apm' => $request->apm,
            'telefono' => $request->telefono,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'contrasena' => Hash::make($request->contrasena),
            'contrasena_confirmar' => Hash::make($request->contrasena_confirmar),
            'departamento_id' => $request->departamento_id,
            'imagen' => $imagen2,
            /* 'imagen' => $request->imagen = $imagenUsuario, */
            'estatus' => $request->estatus,
        ]);

        // Autenticar un usuario
        /* auth()->attempt([
        'email' => $request->email,
        'contrasena' => $request->contrasena
        ]); */

        /* auth()->attempt($usuario->only('usuario', 'contrasena')); */

        return redirect()
            ->route('usuarios.index')
            ->withSuccess("El usuario $usuario->nombre se guardo correctamente");
    }

    /*  actualiza un usuario */
    public function edit(Usuario $usuario)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if ($sessionusuario <> "") {
            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */
            return view('system.usuarios.edit', compact('notificacionusuario'), [
                'usuario' => $usuario,
                'departamentos' => Departamento::select('id', 'nombre')->get()
            ]);
        } else {
            Session::flash('mensaje', 'Inicar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function update(Request $request, Usuario $usuario)
    {
        /*   dd($request->all()); */
        $request->validate([
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'telefono' => 'required',
            'usuario' => '',
            'email' => '',
            'contrasena' => 'required', 
            'contrasena_confirmar' => 'required',
            'departamento_id' => 'required',
            'imagen' => 'image|mimes:jpg,png,jpeg|max:2048',
            'estatus' => 'required'
        ]);
        /* $usu = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'archivos/';
            $imagen2 = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagen2);
            $usu['imagen'] = "$imagen2";
        } else {
            unset($usu['imagen']);
        } */

        $file = $request->file('imagen');
        if($file<>"")
        {
            $imagen = $file->getClientOriginalName();
            $imagen2 = date('YmdHis') . $imagen;
            \Storage::disk('local')->put($imagen2, \File::get($file));
        }


        $usuario->update([
            'nombre' => $request->nombre,
            'app' => $request->app,
            'apm' => $request->apm,
            'telefono' => $request->telefono,
            'contrasena' => Hash::make($request->contrasena),
            'contrasena_confirmar' => Hash::make($request->contrasena_confirmar),
            'departamento_id' => $request->departamento_id,
            'estatus'=> $request->estatus,
            'imagen' => $imagen2,
        ]);
        
        return redirect()
            ->route('usuarios.index')
            ->withSuccess("El usuario $usuario->nombre se actualizo exitosamente");
    }

    /* retorna los valores a la tabla inicial del modulo */
    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Usuario::query()
            )->toJson();
    }

    /* muestra el detalle de actividades asignadas y de usuario */
    public function show($id)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if ($sessionusuario <> "") {

            /* Mostrar las notificaciones que tiene el usuario  */

            /* $usuario=Usuario::find(1);   
            if (count($usuario->unreadNotifications)){
                echo count($usuario->unreadNotifications);
            } */
            
            $usuarios = Usuario::findOrFail($id);
            $departamentos = DB::select("SELECT usu.nombre, depa.nombre, depa.abreviatura, depa.estatus
            FROM usuarios AS usu
            INNER JOIN departamentos AS depa
            ON usu.departamento_id = depa.id
            WHERE usu.id = $id");

            $tareas = DB::select("SELECT tar.nombre FROM tareas  AS tar
            INNER JOIN usuarios AS usu
            ON tar.usuario_id = usu.id
            WHERE usuario_id = $id");

            $usuario = Usuario::findOrFail($id);
            if (count($usuarios->unreadNotifications)){
            }
            foreach ($usuarios->unreadNotifications as $notificacion){
            }
            foreach ($usuarios->readNotifications as $notificacion){

            }

            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */

            
            return view('system.usuarios.show', compact('usuarios', 'tareas', 'departamentos', 'usuario', 'notificacion', 'notificacionusuario'));
            
        } else {
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function markNotification(Request $request)
    {
        $sessionid = session('sessionid');
        $usuarioid = Usuario::findOrFail($sessionid);
        $usuarioid->unreadNotifications
            ->when($request->input('id'), function($query) use ($request){
                return $query->where('id', $request->input('id'));
            })->markAsRead();
            return response()->noContent();
    }
}
