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
            $table->string('descripcion');
            $table->string('fecha_estimadaentrega');
            $table->foreignId('servicios_id')
                ->references('id')
                ->on('servicios');
            $table->foreignId('clientes_id')
                ->references('id')
                ->on('clientes');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
