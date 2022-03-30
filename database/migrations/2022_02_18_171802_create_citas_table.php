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
            $table->string('lugar');
            $table->string('tipo_cita');
            $table->foreignId('usuario_id')
                ->references('id')
                ->on('usuarios');
            $table->foreignId('cliente_id')
                ->references('id')
                ->on('clientes');
            $table->foreignId('estatucita_id')
                ->references('id')
                ->on('estatucitas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
