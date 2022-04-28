<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required'],
            'fecha' => ['required'],
            'tema' => ['required'],
            'hora' => ['required'],
            'duracion_cita' => ['required'],
            'lugar' => ['nullable'],
            'link' => ['nullable'],
            'tipo_cita' => ['required'],
            'usuarios_id' => ['required'],
            'clientes_id' => ['required'],
            'estatucitas_id' => ['required']
        ];
    }
}
