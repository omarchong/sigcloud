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
            $table->foreignId('clientes_id')
                ->references('id')
                ->on('clientes');
            $table->foreignId('estatucotizacion_id')
                ->references('id')
                ->on('estatucotizacions');
            $table->string('fecha_estimadaentrega');
            $table->string('descripcion');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
