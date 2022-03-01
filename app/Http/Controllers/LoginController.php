<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Session;

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

        $usuario = $request['usuario'];
        $asunto = "Recuperacion  de contraseña";
        $consulta = DB::select("SELECT * FROM usuarios where  usuario = '$usuario'");
        if($consulta!=null)
        {
            $letras ="abcdefghijklmnopqrstuvwxyz0123456789";
            $nuevopassword = substr(str_shuffle($letras),0,8);
            $passwordEncryptado = Hash::make($nuevopassword);
            DB::SELECT("UPDATE usuarios SET password='$passwordEncryptado' WHERE usuario = '$usuario'");
            $datos = array('destinatario'=>$usuario, 'nuevopassword'=>$nuevopassword);
            Mail::send('recuperacionpassword', $datos, function($msj)
            use($usuario, $nuevopassword, $asunto){
                $msj->from("al221811717@gmail.com", "SIGCLOUD");
                $msj->subject($asunto);
                $msj->to($usuario);
            });
            Session::flash('mensaje','Revise su correo electrónico, porque ahí le llegará su nueva contraseña');
            return view('sytem.login.login');
        }
        else{
            return redirect('restaurar')->compact("estado","El correo ingresado no esta registrado");
        }
        /* dd($request->all()) */
    }
}
