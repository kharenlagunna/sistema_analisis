<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRTablaContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_tabla_contenido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tabla_homologacion_id');
            $table->unsignedBigInteger('contenido_tabla_id');
            $table->foreign('tabla_homologacion_id')->references('id')->on('tabla_homologacion');
            $table->foreign('contenido_tabla_id')->references('id')->on('contenido_tabla_homologacion');
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
        Schema::dropIfExists('r_tabla_contenido');
    }
}
