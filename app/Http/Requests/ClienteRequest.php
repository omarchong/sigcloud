<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'tipocliente' => ['required'],
            'nombreempresa' => ['required'],
            'estado_id' => ['required'],
            'cp' => ['required'],
            'referencias' => ['required'],
            'direccionfiscal' => [''],
            'estatuscliente' => ['required'],
            'giro_id' => ['required'],
            'contacto_id' => ['required'],
            'rfc' => ['required'],
        ];
    }
}
