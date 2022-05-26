<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{

    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('fecha_limite');
            $table->time('hora_limite');
            $table->string('tipo_tarea');
            $table->foreignId('usuario_id')->constrained();
            $table->foreignId('clientes_id')->constrained();
            $table->foreignId('estatutareas_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

        });
    }


    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
