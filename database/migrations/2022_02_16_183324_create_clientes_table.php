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
            $table->string('estado');
            $table->string('municipio');
            $table->integer('cp');
            $table->string('referencias');
            $table->string('estadofiscal');
            $table->string('municipiofiscal');
            $table->integer('cpfiscal');
            $table->string('referenciasfiscal');
            $table->string('estatuscliente');
            $table->string('giro');
            $table->string('rfc');
            /* $table->foreignId('contacto_id')
                ->references('id')
                ->on('contactos'); */
            /* otra manera de crear relaciones */
            $table->foreignId('contacto_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
