<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cotizaciones';
    protected $fillable = [
        'descripcion',
        'fecha_estimadaentrega',
        'clientes_id',
        'estatucotizacion_id',
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function detallecotizacion()
    {
        return $this->belongsTo(DetalleCotizacion::class);
    }
    public function ordenpagos()
    {
        return $this->belongsTo(Ordenpago::class);
    }
    public function cotizaciones()
    {
        return $this->belongsTo(
            DetalleCotizacion::class,
            'id',
            'cotizacion_id',
        );
    }
}
