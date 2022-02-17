<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipocliente',
        'nombreempresa',
        'estado',
        'municipio',
        'cp',
        'referencias',
        'estadofiscal',
        'municipiofiscal',
        'cpfiscal',
        'referenciasfiscal',
        'estatuscliente',
        'giro',
        'servicio',
        'rfc',
        'contacto_id'
    ];
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

}
