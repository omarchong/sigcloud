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
            'contacto1' => ['required'],
            'email1' => ['required'],
            'telefono1' => ['required'],
            'contacto2' => [''],
            'email2' => [''],
            'telefono2' => [''],
            'contacto3' => [''],
            'email3' => [''],
            'telefono3' => [''],
            'descripcion' => ['required'],
            'servicios_id' => ['required']
        ];
    }
}
