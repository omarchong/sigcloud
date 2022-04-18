<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Estatucita;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function index()
    {
        return view('system.citas.index');
    }

    public function create()
    {   
        return view('system.citas.create',[
            'usuarios' => Usuario::select('id','nombre')->get(),
            'clientes' => Cliente::select('id','nombreempresa')->get(),
            'estatucitas' => Estatucita::select('id','nombre')->get()
          ]);
    }

    public function store(CitaRequest $request)
    {    
        /* dd($request->all()); */

        $cita = Cita::create($request->validated());
        return redirect()
        ->route('citas.index');
    }

    public function edit(Cita $cita)
    {
        return view('system.citas.edit', [
            'cita' => $cita,
            'usuarios' => Usuario::select('id','nombre')->get(),
            'clientes' => Cliente::select('id','nombreempresa')->get(),
            'estatucitas' => Estatucita::select('id','nombre')->get(),
        ]);
    }

    public function update(CitaRequest $request, cita $cita)
    {   
        $cita->update();
        return redirect()
        ->route('citas.index')
        ->withSuccess("La cita $cita->nombre se actualizo exitosamente");
    }
    
    public function RegistrosDatatables()
    {
        return datatables()
      ->eloquent(
        Cita::query()
          ->with(['usuarios', 'clientes', 'estatucitas'])
      )
      ->toJson();
    }
}
