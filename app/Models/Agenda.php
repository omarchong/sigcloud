<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'cita_id'
    ];

    public function citas()
    {
        return $this->hasMany('Cita::class');
    }
}
