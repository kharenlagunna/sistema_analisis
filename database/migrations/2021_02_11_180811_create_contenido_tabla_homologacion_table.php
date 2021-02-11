<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidoTablaHomologacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_tabla_homologacion', function (Blueprint $table) {
            $table->id();
            $table->string('grupo_categoria', 100);
            $table->string('categoria_especifica', 100);
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
        Schema::dropIfExists('contenido_tabla_homologacion');
    }
}
