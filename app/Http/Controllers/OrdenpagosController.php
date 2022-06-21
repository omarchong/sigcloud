<?php

namespace App\Http\Controllers;

use App\Models\Ordenpago;
use App\Models\Estatuorden;
use App\Models\Cotizacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Session;
class OrdenpagosController extends Controller
{
    public function index()
    {
      $sessionusuario = session('sessionusuario');
      $sessionid = session('sessionid');
      if($sessionusuario<>"")
      {
        /* Variable notificacion */
        $notificacionusuario = Usuario::find($sessionid);
        /* Fin de la Variable notificacion */
        return view('system.ordenpagos.index', compact('notificacionusuario'));
      }
      else{
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
      return view('system.ordenpagos.create', compact('notificacionusuario'));
    }

    public function destroy_orden($id)
    {
        Ordenpago::find($id)->delete();
        return response()->json(['success' => 'Orden borrado']);
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
