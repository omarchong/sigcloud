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
            Session::put('sessionusuario', $consulta[0]->nombre. ' ' .$consulta[0]->app);
            return redirect()->route('inicio');
        } else {

            return redirect()->route('login');
        }
    }
    public function inicio()
    {
            return view('system.dashboard.principal');

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
            DB::SELECT("UPDATE usuarios SET password = '$passwordEncryptado' WHERE email = '$email'");


            $datos = array('destinatario'=>$email, 'nuevopassword'=>$nuevopassword);
            Mail::send('system.login.passwordrecuperada', $datos, function($msj)
            use($email, $nuevopassword, $asunto){
                $msj->from("al221811717@gmail.com", "SigCloud");
                $msj->subject($asunto);
                $msj->to($email);
            });
            Session::flash('mensaje','¡Su nueva contraseña a sido enviada exitosamente a su correo electrónico!');
            return redirect()->route('login');
        }
        else{
            return redirect('recuperarcontrasena')->with("mensaje","El correo electrónico ingresado no esta registrado");
        }
        /* dd($request->all()) */
    }
}
