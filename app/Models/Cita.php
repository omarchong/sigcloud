<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha',
        'tema',
        'hora',
        'duracion_cita',
        'lugar',
        'link',
        'tipo_cita',
        'usuarios_id',
        'clientes_id',
        'estatucitas_id'
    ];

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    } 
    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function estatucitas()
    {
        return $this->belongsTo(Estatucita::class);
    }

    public function agendas()
    {
        return $this->belongsTo(Agenda::class);
    }
    
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
