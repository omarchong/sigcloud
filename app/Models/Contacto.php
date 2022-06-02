<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $fillable = [
        'contacto1',
        'email1',
        'telefono1',
        'contacto2',
        'email2',
        'telefono2',
        'contacto3',
        'email3',
        'telefono3',
        'descripcion',
        'servicios_id'
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
    public function servicios()
    {
        return $this->belongsTo(Servicio::class);
    }
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }

}
