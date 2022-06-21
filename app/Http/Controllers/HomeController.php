<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if ($sessionusuario <> "") {
            $servicios = Servicio::count();
            $notificacionusuario = Usuario::find($sessionid);
            
            return view('home.index', compact('servicios', 'notificacionusuario'));
        } else {
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }
    /* public function navbar()
    {
        $sessionid = session('sessionid');
        $notificacionusuario = Usuario::find($sessionid);
        if (count($notificacionusuario->unreadNotifications)) {
        }
        foreach ($notificacionusuario->unreadNotifications as $notificacion) {
        }
        foreach ($notificacionusuario->readNotifications as $notificacion) {
        }
        return view('layouts.partials.navbar', compact('notificacionusuario', 'notificacion'));
    } */
    
    public function markNotification(Request $request)
    {
        $sessionid = session('sessionid');
        $usuarioid = Usuario::findOrFail($sessionid);
        $usuarioid->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })->markAsRead();
        return response()->noContent();
    }
}
