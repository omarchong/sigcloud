<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
  public function index()
  {
    $servicios = Servicio::all();
    return view("system.servicios.index")->with('servicios', $servicios);
  }
  public function create()
  {
    return view('system.servicios.create');
  }
  public function store(ServicioRequest $request)
  {
    /* dd($request->all()); */
    $servicio = Servicio::create($request->validated());

    return redirect()
      ->route('servicios.index')
      ->withSuccess("El servicio $servicio->nombre se dio de alta correctamente");
  }
  public function edit(servicio $servicio)
  {
    return redirect()->route('servicios.index', [
      'servicio' => $servicio
        ->get()
    ]);
  }
  public function update(ServicioRequest $request, servicio $servicio)
  {
    $servicio->update($request->validated());
    $servicio->save();
    return redirect()
      ->route('servicios.index')
      ->withSuccess("El servicio $servicio->nombre ha sido modificado correctamente");
  }
}
