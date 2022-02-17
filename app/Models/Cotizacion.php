<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['descripcion', 'fecha_estimadaentrega', 'servicio_id', 'cliente_id'];
    public function servicio()
    {
        return $this->hasMany(Servicio::class);
    }
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
    public function detallecotizacion()
    {
        return $this->belongsTo(DetalleCotizacion::class);
    }
    public function ordenpagos()
    {
        return $this->belongsTo(Ordenpago::class);
    }
}
