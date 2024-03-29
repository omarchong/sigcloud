<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Session;
use Mail;
use DB;


class LoginController extends Controller
{
    public function login()
    {
        return view('system.login.login');
    }
    public function validar(Request $request)
    {
        $usuario = $request->usuario;
        $contrasena = $request->contrasena;

        $this->validate($request, [
            'usuario' => 'required',
            'contrasena' => 'required',
        ]);

        $consulta = Usuario::where('usuario', $request->usuario)
            ->where('estatus', 'Si')
            ->get();
        $cuantos = count($consulta);

        if ($cuantos == 1 and Hash::check($request->contrasena, $consulta[0]->contrasena)) 
        {
            Session::put('sessionid', $consulta[0]->id);
            Session::put('sessionusuario', $consulta[0]->nombre);
            Session::put('sessiontipo', $consulta[0]->tipo);
            return redirect()->route('inicio');
        } 
        else 
        {
            Session::flash('mensaje', "El usuario o password no son validos");
            return redirect()->route('login');
        }
    }
    public function inicio()
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        $sessiontipo = session('sessiontipo');
        if($sessionusuario<> "")
        {
            $notificacionusuario =Usuario::find($sessionid);   
            if (count($notificacionusuario->unreadNotifications)){
                
            }
            $servicios = Servicio::count();

            return view('home.index', compact('notificacionusuario', 'servicios'));
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }

    }

    public function recuperarcontrasena()
    {
        return view('system.login.recuperacionpassword');
    }


    public function recuperacion(Request $request)
    {
        $email = $request['email'];
        $asunto = "Recuperacion  de contraseña";

        $consulta = DB::select("SELECT * FROM usuarios where  email = '$email'");
        if($consulta!=null)
        {
            $letras = "abcdefghijklmnopqrstuvwxyz0123456789";
            $nuevopassword = substr (str_shuffle($letras),0,8);
            $passwordEncryptado = Hash::make($nuevopassword);
            DB::SELECT("UPDATE usuarios SET contrasena = '$passwordEncryptado' WHERE email = '$email'");


            $datos = array('destinatario'=>$email, 'nuevopassword'=>$nuevopassword);
            Mail::send('system.login.passwordrecuperada', $datos, function($msj)
            use($email, $nuevopassword, $asunto){
                $msj->from("omar.chong@dswestudio.com", "SigCloud");
                $msj->subject($asunto);
                $msj->to($email);
            });
            Session::flash('mensaje','¡Su nueva contraseña a sido enviada exitosamente a su correo electrónico!');
            return redirect()->route('login');
        }
        else{
            return redirect('recuperarpassword')->with("mensaje","El correo electrónico ingresado no esta registrado");
        }
        /* dd($request->all()) */

    
    }

    public function cerrarsesion()
    {
        Session::forget('sesionusuario');
        Session::flush();
        Session::flash('mensaje',"Sesión cerrada correctamente"); 
        return redirect()->route('login');
    }
}
