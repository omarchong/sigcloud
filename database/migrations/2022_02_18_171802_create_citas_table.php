<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha');
            $table->string('tema');
            $table->time('hora');
            $table->string('duracion_cita');
            $table->string('lugar')->nullable();
            $table->string('link')->nullable();
            $table->string('tipo_cita');
            $table->foreignId('usuarios_id')->constrained();
            $table->foreignId('clientes_id')->constrained();
            $table->foreignId('estatucitas_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
