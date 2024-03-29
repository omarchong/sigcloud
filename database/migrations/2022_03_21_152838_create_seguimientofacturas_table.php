<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientofacturasTable extends Migration
{
    
    public function up()
    {
        Schema::create('seguimientofacturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ordenpagos_id')->constrained();
            $table->date('factura_creada');
            $table->integer('cantidadtotal');
            $table->integer('num_pago');
            $table->integer('saldorestante');
            $table->date('fecha_vencimiento');
            $table->foreignId('estatufacturas_id')->constrained();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('seguimientofacturas');
    }
}
