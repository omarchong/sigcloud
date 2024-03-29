<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estatuproyecto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];


    public function proyectos()

    {
        return $this->belongsTo(Proyecto::class);
    }
}
