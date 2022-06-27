<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientofacturaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'ordenpagos_id' => ['required'],
            'factura_creada' => ['required'],
            'cantidadtotal' => ['required'],
            'num_pago' => ['required'],
            'saldorestante' => ['required'],
            'fecha_vencimiento' => ['required'],
            'estatufacturas_id' => ['required']
        ];
    }
}
