<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tarea extends Model
{
    use HasFactory;
    protected $table= 'tareas';
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_limite',
        'hora_limite',
        'tipo_tarea',
        'usuario_id',
        'clientes_id',
        'estatutareas_id',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class);
    }

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function estatutareas()
    {
        return $this->belongsTo(Estatutarea::class);
    }
    
    /* public function citas()
    {
        return $this->hasMany(Cita::class);
    } */
}
