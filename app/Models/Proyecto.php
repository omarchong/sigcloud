<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_parciales',
        'fecha_entrega',
        'hora_entrega',
        'plan_pago',
        'usuario_id',
        'cliente_id',
        'estatusproyecto_id',
        'tipoproyecto_id',
        'detallecotizacion_id'
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }

   
    public function tipoproyectos()
    {
        return $this->hasOne(Tipoproyecto::class);
    }
    public function detallecotizaciones()
    {
        return $this->hasOne(DetalleCotizacion::class);
    }
}
