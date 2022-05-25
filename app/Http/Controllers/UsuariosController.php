<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioEditRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Departamento;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        return view('system.usuarios.index');
    }

    public function create()
    {
        return view('system.usuarios.create', [
            'departamentos' => Departamento::select('id', 'nombre')->get()
        ]);
    }

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



    public function edit(Usuario $usuario)
    {
        return view('system.usuarios.edit', [
            'usuario' => $usuario,
            'departamentos' => Departamento::select('id', 'nombre')->get()
        ]);
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
    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Usuario::query()
            )->toJson();
    }


    public function show($id)
    {
        $usuarios = Usuario::findOrFail($id);
        return view('system.usuarios.show', compact('usuarios'));
    }
}
