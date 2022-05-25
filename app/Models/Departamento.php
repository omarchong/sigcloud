<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamentos';

    protected $fillable = [
        'abreviatura',
        'nombre',
        'estatus',
        'descripcion',
        'n_empleados'
    ];

    public function usuarios()
    {
        return $this->hasOne(Usuario::class);
    }
}
