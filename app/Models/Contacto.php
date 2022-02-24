<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'descripcion'
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

}
