<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Estatutarea;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
  public function index()
  {
    return view("system.servicios.index");
  }




  public function store(Request $request)

  {

    $servicio = Servicio::updateOrCreate(
      [
        'id' => $request->id,
      ],
      [
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio_inicial'  => $request->precio_inicial,
        'precio_final' => $request->precio_final,
      ]
    );
    return response()->json(['success' => true]);
    /* dd($request->all()); */
    /*  $servicio = Servicio::create($request->validated());

    return redirect()
      ->route('servicios.index')
      ->withSuccess("El servicio $servicio->nombre se dio de alta correctamente"); */
  }

  public function edit(Request $request)
  {
    $where = array('id' => $request->id);
    $servicio = Servicio::where($where)->first();
    return response()->json($servicio);
  }

  public function RegistrosDatatables()
  {
    return datatables()
      ->eloquent(Servicio::query())->toJson();
  }

  public function destroy(Request $request)
  {
    $servicio = Servicio::where('id', $request->id)->delete();
    return response()->json(['success' => true]);
  }
}
