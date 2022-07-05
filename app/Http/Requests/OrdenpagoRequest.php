<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenpagoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contacto1' => ['required'],
            'nombre_proyecto' => ['required'],
            'cantidadtotal' => ['required'],
            'num_pago' => ['required'],
            'totalapagar' => ['required'],
            'primer_pago' => ['required'],
            'segundo_pago' => ['required'],
            'emite' => ['required'],
            'estatuorden_id' => ['required'],
            'cotizacion_id' => ['required']
        ];
    }
}
