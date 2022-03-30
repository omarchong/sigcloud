<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('nombre');
            $table->string('activo');
            $table->foreignId('estado_id')->constrained();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
