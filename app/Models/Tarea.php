<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tarea extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_limite',
        'hora_limite',
        'tipo_tarea',
        'usuarios_id',
        'estatutareas_id',
        'clientes_id'
        /* 'citas_id' */
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }

    public function estatutareas()
    {
        return $this->hasOne(Estatutarea::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cita::class);
    }
    /* public function citas()
    {
        return $this->hasMany(Cita::class);
    } */
}
