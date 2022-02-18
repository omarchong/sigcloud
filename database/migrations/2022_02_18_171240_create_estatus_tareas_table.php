<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatusTareasTable extends Migration
{

    public function up()
    {
        Schema::create('estatus_tareas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('estatus_tareas');
    }
}
