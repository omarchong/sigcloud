<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioEditRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Departamento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UsuariosController extends Controller
{
    /* retorna ala vista inicial del modulo usuarios */
    public function index()
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<> "")
        {
        return view('system.usuarios.index');
        } 
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    /* retorna a la vista de crear usuario */
    public function create()
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.usuarios.create', [
                'departamentos' => Departamento::select('id', 'nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', 'Inicar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    /* crea un usuario */
    public function store(UsuarioRequest $request)
    {
            /* dd($request->all()); */

            $usuario = $request->all();

            if ($imagen = $request->file('imagen')) {
                $rutaGuardarImg = 'imagen/';
                $imagenUsuario = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImg, $imagenUsuario);
                $usuario['imagen'] = "$imagenUsuario";
            }
            /* $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'app' => $request->app,
                'apm' => $request->apm,
                'telefono' => $request->telefono,
                'usuario' => $request->usuario,
                'email' => $request->email,
                'contrasena' => Hash::make($request->contrasena),
                'contrasena_confirmar' => Hash::make($request->contrasena_confirmar),
                'departamento' => $request->departamento,
                'imagen' => $request->imagen,
                'estatus' => $request->estatus,
            ]); */
            $usuario = Usuario::create($usuario);
            return redirect()
                ->route('usuarios.index')
                ->withSuccess("El usuario $usuario->nombre se guardo correctamente");
            /*   dd($request->all()); */
            /*  $request->validate([
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'telefono' => 'required',
            'usuario' => 'required|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required',
            'contrasena_confirmar' => 'required|same:contrasena',
            'departamento' => 'required',
            'imagen' => 'image|mimes:jpg,png,jpeg|max:2048',
            'estatus' => 'required',
            ]); */

     }


    /*  actualiza un usuario */
    public function edit(Usuario $usuario)
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.usuarios.edit', [
                'usuario' => $usuario,
                'departamentos' => Departamento::select('id', 'nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', 'Inicar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function update(UsuarioEditRequest $request, usuario $usuario)
    {
        /*   dd($request->all()); */
        $usu = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenUsuario = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenUsuario);
            $usu['imagen'] = "$imagenUsuario";
        } else {
            unset($usu['imagen']);
        }

        $usuario->update($usu);


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
        if($sessionusuario<>"")
        {
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
            return view('system.usuarios.show', compact('usuarios', 'tareas', 'departamentos'));
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }
}
