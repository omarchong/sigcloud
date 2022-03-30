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
        'estatutarea_id',
        'cliente_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario',"usuario_id");
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente',"cliente_id");
    }

    public function estatutarea()
    {
        return $this->belongsTo('App\Models\Estatutarea',"estatutarea_id");
    }
    
    /* public function citas()
    {
        return $this->hasMany(Cita::class);
    } */
}
