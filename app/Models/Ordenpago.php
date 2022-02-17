<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordenpago extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillabe = ['folio', 'num_pago', 'emite', 'fecha_limite', 'cotizacion_id', 'estatusorden_id'];

    public function estatusorden()
    {
        return $this->hasOne(Estatuorden::class);
    }
    public function cotizacion()
    {
        return $this->hasMany(Cotizacion::class);
    }
}
