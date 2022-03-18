<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;

    protected $fillable = [
        'actividad',
        'fecha_inicio',
        'fecha_fin',
        'hora_entrega',
        'usuario_id',
        'estatutarea_id',
        'proyecto_id',
    ];

    public function usuarios()
    {
        return $this->hasOne(Usuario::class);
    }

    public function estatustareas()
    {
        return $this->hasOne(Estatutarea::class);
    }
    public function proyectos()
    {
        return $this->hasOne(Proyectos::class);
    }
}
