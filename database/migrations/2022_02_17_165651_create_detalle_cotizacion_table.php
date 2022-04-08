<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCotizacionTable extends Migration
{

    public function up()
    {
        Schema::create('detalle_cotizacion', function (Blueprint $table) {
            $table->id();
            $table->string('numero_servicios');
            $table->float('precio_bruto');
            $table->float('precio_iva');
            $table->float('total');
            $table->integer('descuento_general');
            $table->foreignId('cotizacion_id')
                ->references('id')
                ->on('cotizaciones');
            $table->foreignId('estatucotizacion_id')
                ->references('id')
                ->on('estatucotizacions');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('detalle_cotizacion');
    }
}
