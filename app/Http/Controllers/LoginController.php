<?php

namespace App\Http\Controllers;

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
        $password = $request->password;

        $this->validate($request, [
            'usuario' => 'required',
            'password' => 'required',
        ]);

        $consulta = Usuario::where('usuario', $request->usuario)
            ->where('estatus', 'Si')
            ->get();
        $cuantos = count($consulta);

        if ($cuantos == 1 and Hash::check($request->password, $consulta[0]->password)) {
            Session::put('sessionusuario', $consulta[0]->nombre . ' ' . $consulta[0]->app);
            return redirect()->route('inicio');
        } else {
           
            return redirect()->route('login');
        }
    }
    public function inicio()
    {
            return view('welcome');
    
    }

    public function recuperarcontraseña()
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
            DB::SELECT("UPDATE usuarios SET password = '$passwordEncryptado' WHERE email = '$email'");


            $datos = array('destinatario'=>$email, 'nuevopassword'=>$nuevopassword);
            Mail::send('system.login.passwordrecuperada', $datos, function($msj)
            use($email, $nuevopassword, $asunto){
                $msj->from("cristhianzacarias@gmail.com", "SigCloud");
                $msj->subject($asunto);
                $msj->to($email);
            });
            Session::flash('mensaje','Revise su correo electrónico, porque ahí le llegará su nueva contraseña');
            return view('sytem.login.login');
        }
        else{
            return redirect('restaurarcontraseña')->compact("estado","El correo ingresado no esta registrado");
        }
    }
}
