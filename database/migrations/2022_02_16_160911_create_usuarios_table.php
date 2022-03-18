<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{

    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('app');
            $table->string('apm');
            $table->string('telefono');
            $table->string('usuario')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('password_confirmar');
            $table->string('departamento');
            $table->string('imagen')->nullable();
            $table->string('estatus');
            /* $table->foreignId('rol_id')
                ->references('id')
                ->on('roles'); */
                /* $table->foreignId('rol_id')->constrained(); */
            
            $table->timestamps();
            $table->softDeletes();  
        });
    }


    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
