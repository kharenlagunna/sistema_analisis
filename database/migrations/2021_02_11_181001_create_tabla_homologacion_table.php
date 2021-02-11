<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaHomologacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_homologacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tabla', 100);
            $table->string('descripcion_tabla', 100);
            $table->string('sector_industria_tabla', 100);
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
        Schema::dropIfExists('tabla_homologacion');
    }
}
