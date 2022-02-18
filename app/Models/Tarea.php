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
        'usuario_id',
        'estatustareas_id',
        'cita_id'
    ];
}
