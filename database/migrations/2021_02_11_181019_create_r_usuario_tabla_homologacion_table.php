<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRUsuarioTablaHomologacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_usuario_tabla_homologacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tabla_homologacion_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('tabla_homologacion_id')->references('id')->on('tabla_homologacion');
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
        Schema::dropIfExists('r_usuario_tabla_homologacion');
    }
}
