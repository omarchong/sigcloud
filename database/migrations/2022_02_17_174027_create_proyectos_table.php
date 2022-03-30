<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{

    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_parciales');
            $table->date('fecha_entrega');
            $table->time('hora_entrega');
            $table->string('plan_pago');
            $table->foreignId('usuario_id')
                ->references('id')
                ->on('usuarios');
            $table->foreignId('cliente_id')
                ->references('id')
                ->on('clientes');
            $table->foreignId('estatuproyecto_id')
                ->references('id')
                ->on('estatuproyectos');
            $table->foreignId('tipoproyecto_id')
                ->references('id')
                ->on('tipoproyectos');
            $table->foreignId('detallecotizacion_id')
                ->references('id')
                ->on('detalle_cotizacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
