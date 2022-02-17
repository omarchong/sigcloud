<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatusfacturaTable extends Migration
{
    
    public function up()
    {
        Schema::create('estatusfactura', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('estatusfactura');
    }
}
