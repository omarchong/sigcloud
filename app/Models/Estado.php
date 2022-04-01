<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = [
        'clave',
        'nombre',
        'abrev',
        'activo'
    ];
    public function municipios()
    {
        return $this->belongsToMany(Municipio::class);
    }
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
