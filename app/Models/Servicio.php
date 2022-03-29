<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_inicial',
        'precio_final',
        'estatuservicios_id'
    ];

<<<<<<< HEAD
    public function estatuservicios()
    {
        return $this->hasOne(Estatuservicio::class);
=======
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
>>>>>>> main
    }
}
