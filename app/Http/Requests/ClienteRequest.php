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
            'estado' => ['required'],
            'municipio' => ['required'],
            'cp' => ['required'],
            'referencias' => ['required'],
            'estadofiscal' => [''],
            'municipiofiscal' => [''],
            'cpfiscal' => [''],
            'referenciasfiscal' => [''],
            'estatuscliente' => ['required'],
            'giro' => ['required'],
            'servicio' => ['required'],
            'rfc' => ['required'],
        ];
    }
}
