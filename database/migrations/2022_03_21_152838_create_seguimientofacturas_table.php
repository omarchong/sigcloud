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
            $table->foreignId('ordenpagos_id')
                ->references('id')
                ->on('ordenpagos');
            $table->date('factura_creada');
            $table->integer('num_pago');
            $table->date('fecha_vencimiento');
            $table->foreignId('estatufactura_id')
                ->references('id')
                ->on('estatufacturas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('seguimientofacturas');
    }
}
