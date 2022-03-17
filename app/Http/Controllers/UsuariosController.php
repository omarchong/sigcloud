<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

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
        /* dd($request->all()); */
        $file = $request->file('imagen');
        $imagen = $file->getClientOriginalName();
        $img2 = $request->id . $imagen;
        \Storage::disk('local')->put($img2, \File::get($file));
        $usuario = Usuario::create($request->validated());

        return redirect()
            ->route('usuarios.index')
            ->withSuccess("El usuario $usuario->nombre se guardo correctamente");
    }

    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Usuario::query()
            )->toJson();
    }
}
