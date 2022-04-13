<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleCotizacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'numero_servicios',
        'precio_bruto',
        'precio_iva',
        'subtotal',
        'total',
        'descuento_general',
        'cotizacion_id',
        'estatucotizacion_id',
    ];

    public function cotizaciones()
    {
        return $this->hasOne(Cotizacion::class);
    }
    public function estatuscotizaciones()
    {
        return $this->hasOne(Estatucotizacion::class);
    }

    public function proyectos()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
