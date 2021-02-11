<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidoBaseInformacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_base_informacion', function (Blueprint $table) {
            $table->id();
            $table->string('llave_cruce', 100);
            $table->text('campo_informacion');
            $table->string('grupo_categoria', 100); // Ver como dejar not null
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
        Schema::dropIfExists('contenido_base_informacion');
    }
}
