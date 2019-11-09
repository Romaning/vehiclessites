<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesPerfilVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_perfil_vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('archivo_subido',191);
            $table->string('nombre_imagen_perfil',191);
            /*FOREIGN KEYS*/
            $table->string('placa_id',100);
            /*FECHA DE CREACION, ACTUALIZACION Y ELIMINACION LÓGICA*/
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_perfil_vehiculos');
    }
}
