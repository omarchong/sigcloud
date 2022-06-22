<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Usuario extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table = 'usuarios';

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
        return $this->hasMany('App\Cita');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
    
    public function cronogramas()
    {
        return $this->belongsTo(Cronograma::class);
    }
    public function departamentos()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function actividad()
    {
        return $this->hasMany(Actividad::class);
    }
}
