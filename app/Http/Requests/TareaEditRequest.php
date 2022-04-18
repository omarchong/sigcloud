<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaEditRequest extends FormRequest
{
    
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        $tarea = $this->route('tarea');
        return [
            'nombre' => 'required',
            'fecha_limite' => 'required',
            'hora_limite' => 'required',
            'tipo_tarea' => 'required',
            'usuarios_id' => 'required',
            'clientes_id' => 'required',
            'estatutareas_id' => 'required',
            'descripcion' => 'required',
        ];
    }
}