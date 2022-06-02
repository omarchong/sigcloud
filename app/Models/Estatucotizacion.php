<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatucotizacion extends Model
{
    use HasFactory;

    protected $table = 'estatucotizaciones';

    protected $fillable = ['nombre'];  

 
   
}
