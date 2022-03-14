<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            
            'nombre' => ['required'],
            
            'descripcion' => ['required'],
            
            'precio_final' => ['required', 'numeric'],
            
            'precio_inicial' => ['required', 'numeric'],
        ];
    }
}
