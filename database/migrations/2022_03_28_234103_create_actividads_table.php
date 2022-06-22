<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadsTable extends Migration
{
    
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipoactividad');
            $table->date('fecha');
            $table->string('nota');
            $table->foreignId('usuario_id')->constrained();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('actividads');
    }
}
