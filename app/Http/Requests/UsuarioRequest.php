<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
class UsuarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
             
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'telefono' => 'required',
            'usuario' => 'required|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required',
            'contrasena_confirmar' => 'required|same:contrasena',
            'departamento_id' => 'required',
            'imagen' => 'image|mimes:jpg,png,jpeg|max:1024',
            'estatus' => 'required',
        ];
      
    }
}
