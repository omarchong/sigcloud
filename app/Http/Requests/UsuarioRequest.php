<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'contraseña' => 'required',
            'contraseña_confirmar' => 'required|same:contraseña',
            'departamento' => 'required',
            'imagen' => 'image|mimes:jpg,png,jpeg|max:2048',
            'estatus' => 'required',
        ];
        /* if($this->method() !== 'PUT')
        {
            $rules ['email' ] = 'required|string|email|max:255|unique:usuarios,email,' . $this->id;

        } */
    }
}
