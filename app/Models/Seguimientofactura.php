<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimientofactura extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['ordenpagos_id', 'factura_creada', 'num_pago', 'fecha_vencimiento', 'estatufacturas_id'];

    public function ordenpagos()
    {
        return $this->belongsTo(Ordenpago::class);
    }

    public function estatufacturas()
    {
        return $this->belongsTo(Estatufactura::class);
    }
}
