<?php

namespace App\Http\Controllers;

use App\Models\Ordenpago;
use App\Models\Estatuorden;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class OrdenpagosController extends Controller
{
    public function index()
    {
        return view('system.orden.index');
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
