<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'tipocliente',
        'nombreempresa',
        'estado_id',
        'cp',
        'referencias',
        'direccionfiscal',
        'estatuscliente',
        'rfc',
        'contacto_id',
        'giro_id'
    ];
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tarea()
    {
        return $this->hasMany('App\Tarea');
    }
    
    public function giros()
    {
        return $this->hasOne(Giro::class);
    }

    public function estados()
    {
        return $this->belongsTo(Estado::class);
    }
   
}
