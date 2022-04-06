<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
    public function index()
    {
        return view('system.cotizaciones.index');
    }
}
