<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'precio_inicial',
        'descripcion',
    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }
}
