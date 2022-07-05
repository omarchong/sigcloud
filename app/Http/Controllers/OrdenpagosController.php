<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenpagoRequest;
use App\Models\Ordenpago;
use App\Models\Estatuorden;
use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class OrdenpagosController extends Controller
{
  public function index()
  {
    $sessionusuario = session('sessionusuario');
    $sessionid = session('sessionid');
    if ($sessionusuario <> "") {
      /* Variable notificacion */
      $notificacionusuario = Usuario::find($sessionid);
      /* Fin de la Variable notificacion */
      return view('system.ordenpagos.index', compact('notificacionusuario'), [
        'estatuordens' => Estatuorden::select('id', 'nombre')->get()
      ]);
    } else {
      Session::flash('mensaje', 'Iniciar sesión antes de continuar');
      return redirect()->route('login');
    }
  }

  public function create()
  {
    $sessionid = session('sessionid');
    /* Variable notificacion */
    $notificacionusuario = Usuario::find($sessionid);
    /* Fin de la Variable notificacion */
    return view('system.ordenpagos.create', compact('notificacionusuario'), [
      'cotizaciones' => Cotizacion::select('id', 'nombre_proyecto')->get(),
      'estatuordens' => Estatuorden::select('id', 'nombre')->get()
    ]);
  }

  public function store(OrdenpagoRequest $request)
  {
    /* dd($request->all());  */
    $ordenpago = Ordenpago::create($request->validated());
        return redirect()
            ->route('ordenpagos.index')
            ->withSuccess("El orden de pago se creo correctamente");
  }

  public function edit(Ordenpago $ordenpago)
  {
    $sessionid = session('sessionid');

    $notificacionusuario = Usuario::find($sessionid);
    return view('system.ordenpagos.edit', compact('notificacionusuario'), [
      'ordenpago' => $ordenpago,
      'cotizaciones' => Cotizacion::select('id', 'nombre_proyecto')->get(),
      'estatuorden' => Estatuorden::select('id', 'nombre')->get()
    ]);
  }

  public function update(OrdenpagoRequest $request, Ordenpago $ordenpago)
  {
    /* dd($request->all()); */
    $orden = $request->all();
    $ordenpago->update($orden);
    return redirect()
      ->route('ordenpagos.index')
      ->withSuccess("El orden pago se actualizo correctamente");
  }

  public function destroy_orden($id)
  {
    Ordenpago::find($id)->delete();
    return response()->json(['success' => 'Orden borrado']);
  }

  public function buscaordenpago(Request $request)
  {
    $term = $request->get('term');

    $buscaordenpago = DB::select("SELECT cotizaciones.id, contactos.contacto1, cotizaciones.nombre_proyecto
        FROM detalle_cotizacion
        INNER JOIN cotizaciones ON detalle_cotizacion.cotizacion_id = cotizaciones.id
        INNER JOIN clientes ON cotizaciones.clientes_id = clientes.id
        INNER JOIN contactos ON clientes.contactos_id = contactos.id
        WHERE cotizacion_id LIKE '%$term%'");
    return response()->json($buscaordenpago);
  }

  public function seleccionaordenpago(Request $request)
  {

    $ordenpago = DetalleCotizacion::groupBy('cotizaciones.id', 'contactos.contacto1', 'cotizaciones.nombre_proyecto', 'detalle_cotizacion.cotizacion_id')
      ->join('cotizaciones', 'detalle_cotizacion.cotizacion_id', '=', 'cotizaciones.id')
      ->join('clientes', 'cotizaciones.clientes_id', '=', 'clientes.id')
      ->join('contactos', 'clientes.contactos_id', '=', 'contactos.id')
      ->selectRaw('cotizaciones.id, contactos.contacto1, cotizaciones.nombre_proyecto, SUM(detalle_cotizacion.subtotal) AS cantidadtotal, detalle_cotizacion.cotizacion_id')
      ->where('cotizacion_id', $request->ordenpago)->first();
    return response()->json($ordenpago);
  }

  public function RegistrosDatatables()
  {
    return datatables()
      ->eloquent(
        Ordenpago::query()
          ->with(['estatuorden', 'cotizacion'])
      )
      ->toJson();
  }
}
