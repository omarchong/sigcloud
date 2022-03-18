<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioEditRequest;
use App\Http\Requests\UsuarioRequest;
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
        return view('system.usuarios.create');
    }

    public function store(UsuarioRequest $request)
    {
      /*   dd($request->all()); */

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenUsuario = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenUsuario);
            $imagen = "$imagenUsuario";
           /*  \Storage::disk('local')->put($imagen, \File::get($imagen)); */

        } else {
            $imagen = null;
        }
        $usuario = Usuario::create([
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
        ]);
        /* $usuario = Usuario::create($request->validated()); */
        return redirect()
            ->route('usuarios.index')
            ->withSuccess("El usuario $usuario->nombre se guardo correctamente");
    }

    public function edit(Usuario $usuario)
    {
        return view('system.usuarios.edit', [
            'usuario' => $usuario,
        ]);
    }

    public function update(UsuarioEditRequest $request, usuario $usuario)
    {
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $imagen = "$imagenProducto";
        } else {
            $imagen = null;
        }
        $usuario->update($request->validated());
        $usuario->save();
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
}
