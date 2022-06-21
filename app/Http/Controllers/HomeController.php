<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
    public function index()
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            $servicios = Servicio::count();
            return view('home.index',compact('servicios'));
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

  

}