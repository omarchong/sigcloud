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
            $table->string('folio');
            $table->integer('num_pago');
            $table->string('emite');
            $table->date('fecha_limite');
            $table->foreignId('estatusorden_id')
                ->references('id')
                ->on('estatusorden');
            $table->foreignId('cotizacion_id')
                ->references('id')
                ->on('cotizaciones');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenpagos');
    }
}
