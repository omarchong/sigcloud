<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'app','apm',
                            'telefono', 
                            'usuario', 'email', 'password',
                            'password_confirmar',
                            'departamento','imagen','rol_id'];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
