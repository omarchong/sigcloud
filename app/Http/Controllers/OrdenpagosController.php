<?php

namespace App\Http\Controllers;

use App\Models\Ordenpago;
use App\Models\Estatuorden;
use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Session;
class OrdenpagosController extends Controller
{
    public function index()
    {
      $sessionusuario = session('sessionusuario');
      if($sessionusuario<>"")
      {
        return view('system.orden.index');
      }
      else{
        Session::flash('mensaje', 'Iniciar sesión antes de continuar');
        return redirect()->route('login');
      }
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
