<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UsuarioEditRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        $usuario = $this->route('usuario');
        return [
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'telefono' => 'required',
            'usuario' => '',
            'email' => '',
            'contrasena' => 'required', 
            'contrasena_confirmar' => 'required',
            'departamento_id' => 'required',
            'imagen' => 'image|mimes:jpg,png,jpeg|max:2048',
            'estatus' => 'required',
        ];
    }
}
