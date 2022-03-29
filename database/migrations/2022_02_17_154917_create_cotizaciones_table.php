<?php

use App\Models\Servicio;
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
            $table->date('fecha_estimadaentrega');
            $table->foreignId('servicio_id')
                ->references('id')
                ->on('servicios');
            $table->foreignId('cliente_id')
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
