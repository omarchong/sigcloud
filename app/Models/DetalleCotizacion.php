<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleCotizacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'detalle_cotizacion';

    protected $fillable = [
        'numero_servicios',
        'precio_bruto',
        'precio_iva',
        'subtotal',
        /* 'total', */
        'descuento_general',
        'cotizacion_id',
        'servicios_id'
    ];

    public function cotizaciones()
    {
        return $this->hasOne(Cotizacion::class);
    }
    public function estatuscotizaciones()
    {
        return $this->hasOne(Estatucotizacion::class);
    }
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    public function proyectos()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
