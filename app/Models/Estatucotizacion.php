<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estatucotizacion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function detallecotizacion()
    {
        return $this->belongsTo(DetalleCotizacion::class);
    }
}
