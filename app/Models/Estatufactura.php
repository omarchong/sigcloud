<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estatufactura extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    
    public function seguimientofacturas()
    {
        return $this->hasMany('App\Seguimientofactura');
    }
}
