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
            'clientes_id' => ['required','exists:clientes,id'],
            'numero_servicios' => ['required'],
            'servicios_id' => ['required','exists:servicios,id'],
            'fecha_estimadaentrega' => ['required'],
            'descripcion_global' => ['required'],
            'nombre_proyecto' => ['required']
            
        ];
    }
}
