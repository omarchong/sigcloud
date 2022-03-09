<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nombre' => ['required'],
            'email' => ['required'],
            'telefono' => ['required'],
            'descripcion' => ['required'],
        ];
    }
}
