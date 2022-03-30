<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable = [
        'clave',
        'nombre',
        'activo',
        'estado_id',

    ];
    public function estados()
    {
        return $this->hasMany(Estado::class);
    }
}
