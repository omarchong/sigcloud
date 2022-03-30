<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
   
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            /* $table->bigInteger('estatuservicio_id')->unsigned();
            $table->foreign('estatuservicio_id')->references('id')->on('estatuservicios'); */
            $table->string('descripcion');
            $table->float('precio_inicial');
            $table->float('precio_final');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
