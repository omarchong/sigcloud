<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{

    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proyecto');
            $table->foreignId('clientes_id')
                ->references('id')
                ->on('clientes');
            $table->string('descripcion_global');

            $table->foreignId('estatucotizacion_id')
                ->references('id')
                ->on('estatucotizaciones');
            $table->string('fecha_estimadaentrega');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
