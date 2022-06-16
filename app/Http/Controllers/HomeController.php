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
        if($sessionusuario<>"")
        {
            $servicios = Servicio::count();

            $notificacionusuario = Usuario::find($sessionid);   
                if (count($notificacionusuario->unreadNotifications)){
                
                }
                foreach ($notificacionusuario->unreadNotifications as $notificacion){
                }
                foreach ($notificacionusuario->readNotifications as $notificacion){
    
                }

            return view('home.index',compact('servicios', 'notificacionusuario', 'notificacion'));
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }
    /* public function markNotification(Request $request)
    {
        $sessionusuario = session('sessionusuario');
        
        $sessionusuario->usuarios()->unreadNotifications
            ->when($request->input('id'), function($query) use ($request){
                return $query->where('id', $request->input('id'));
            })->markAsRead();
            return response()->noContent();
    } */

}