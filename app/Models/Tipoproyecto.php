<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipoproyecto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre'];


    public function proyectos()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
