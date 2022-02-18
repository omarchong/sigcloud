<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronogramasTable extends Migration
{

    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_entrega');
            $table->foreignId('usuario_id')
                ->references('id')
                ->on('usuarios');
            $table->foreignId('estatustareas_id')
                ->references('id')
                ->on('estatus_tareas');
            $table->foreignId('proyecto_id')
                ->references('id')
                ->on('proyectos');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cronogramas');
    }
}
