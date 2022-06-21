<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordenpago extends Model
{
    use HasFactory;
    protected $fillable = [
        'folio', 
        'num_pago', 
        'emite', 
        'fecha_limite', 
        'cotizacion_id', 
        'estatuorden_id'
    ];

    public function estatuorden()
    {
        return $this->belongsTo(Estatuorden::class);
    }
    public function cotizacion()
    {   
        return $this->belongsTo(Cotizacion::class);
    }
    
    public function seguimientofacturas()
    {
        return $this->hasMany('App\Seguimientofactura');
    }
}
