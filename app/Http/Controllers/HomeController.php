<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $servicios = Servicio::count();
        return view('home.index',compact('servicios'));
    }

  /*   public function getServicios()
    {
        $servicios = Servicio::count();
        return $servicios;
    }
} */

}