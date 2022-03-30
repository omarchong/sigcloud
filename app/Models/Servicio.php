<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'estatuservicio_id',
        'descripcion',
        'precio_inicial',
        'precio_final'
    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }
    public function estatuservicio()
    {
        return $this->belongsTo('App\Models\Estatuservicio',"estatuservicio_id");
    }
}
