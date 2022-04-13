<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'app',
        'apm',
        'telefono',
        'usuario',
        'email',
        'contrasena',
        'contrasena_confirmar',
        'departamento_id',
        'imagen',
        /* 'rol_id', */
        'estatus'
    ];

    public function roles()
    {
        return $this->hasOne(Rol::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function citas()
    {
        return $this->belongsTo(Cita::class);
    }

    /* public function tareas()
    {
        return $this->belongsTo(Tarea::class);
    } */
    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
    
    public function cronogramas()
    {
        return $this->belongsTo(Cronograma::class);
    }
    public function departamentos()
    {
        return $this->hasOne(Departamento::class);
    }
}
