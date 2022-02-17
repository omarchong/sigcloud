<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatusordenTable extends Migration
{
    
    public function up()
    {
        Schema::create('estatusorden', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('estatusorden');
    }
}
