<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimientofactura extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['ordenpagos_id', 'factura_creada', 'num_pago', 'fecha_vencimiento', 'estatusfactura_id'];

    public function ordenpago()
    {
        return $this->hasMany(Ordenpago::class);
    }
    public function estatusfactura()
    {
        return $this->hasOne(Estatufactura::class);
    }
}
