<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_inicial',
        'precio_final',
        'estatuservicios_id'
    ];

    public function estatuservicios()
    {
        return $this->hasOne(Estatuservicio::class);
    }
}
