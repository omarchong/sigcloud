<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Estatutarea extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];

    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
    
    public function cronogramas()
    {
        return $this->belongsTo(Cronograma::class);
    }
}
