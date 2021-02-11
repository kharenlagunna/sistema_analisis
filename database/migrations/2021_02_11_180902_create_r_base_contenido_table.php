<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRBaseContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_base_contenido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('base_informacion_id');
            $table->unsignedBigInteger('contenido_base_id');
            $table->foreign('base_informacion_id')->references('id')->on('base_informacion');
            $table->foreign('contenido_base_id')->references('id')->on('contenido_base_informacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_base_contenido');
    }
}
