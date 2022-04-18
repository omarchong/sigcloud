<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estatucita extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    
    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
}
