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
        'tipo_cita',
        'usuario_id',
        'cliente_id',
        'estatucita_id'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
    public function estatuscita()
    {
        return $this->hasOne(Estatucita::class);
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
