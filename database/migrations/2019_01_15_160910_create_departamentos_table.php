<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
   
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('abreviatura');
            $table->string('nombre')->nullable();
            $table->string('descripcion');
            $table->string('estatus');
            $table->string('n_empleados');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
