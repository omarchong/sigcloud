<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('tipocliente');
            $table->string('nombreempresa');
            $table->foreignId('estado_id')->constrained();
            $table->integer('cp');
            $table->string('referencias');
            $table->string('direccionfiscal')->nullable();
            $table->string('estatuscliente');
            $table->string('rfc');
            $table->foreignId('contactos_id')->constrained();
            $table->foreignId('giros_id')->constrained();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
