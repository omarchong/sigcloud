<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotizacionRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'numero_servicios' => ['required'],
            'servicios_id' => [''],
            'fecha_estimadaentrega' => ['required'],
            'buscarcliente' => ['required'],
            'buscarservicio' => ['required'],
            
        ];
    }
}
