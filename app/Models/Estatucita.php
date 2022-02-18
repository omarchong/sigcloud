<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estatucita extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nombre'];

    public function citas()
    {
        return $this->belongsTo(Cita::class);
    }
}
