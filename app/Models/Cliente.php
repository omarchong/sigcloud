<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipocliente',
        'nombreempresa',
        'estado_id',
        'cp',
        'referencias',
        'direccionfiscal',
        'estatuscliente',
        'rfc',
        'contactos_id',
        'giros_id'
    ];
    public function contactos() 
    {
        return $this->belongsTo(Contacto::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

/*     public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    } */

    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
    
    public function giros()
    {
        return $this->belongsTo(Giro::class);
    }

    public function estados()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
   
}
