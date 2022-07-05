<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenpagosTable extends Migration
{
    
    public function up()
    {
        Schema::create('ordenpagos', function (Blueprint $table) {
            $table->id();
            $table->string('contacto1');
            $table->string('nombre_proyecto');
            $table->string('cantidadtotal');
            $table->integer('num_pago');
            $table->string('totalapagar');
            $table->date('primer_pago');
            $table->date('segundo_pago');
            $table->string('emite');
            $table->foreignId('estatuorden_id')
                ->references('id')
                ->on('estatuordens');
            $table->foreignId('cotizacion_id')
                ->references('id')
                ->on('cotizaciones');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenpagos');
    }
}
