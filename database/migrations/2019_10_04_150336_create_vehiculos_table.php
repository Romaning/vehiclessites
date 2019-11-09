<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            /*ATRIBUTOS*/
            $table->string('placa_id',100)->primary();
            $table->string('numero_crpva',100);
            $table->string('numero_chasis',100);
            $table->string('numero_motor',100);
            $table->string('documento_importacion',100);
            $table->bigInteger('numero_documento_importacion');
            $table->integer('plazas');
            $table->integer('ruedas');
            $table->string('traccion',100);
            $table->string('color');
            /*FOREIGN KEYS*/
            $table->bigInteger('clase_id');
            $table->bigInteger('marca_id');
            $table->bigInteger('tipo_id');
            $table->bigInteger('tipo_combustible_id');
            $table->bigInteger('tipo_uso_id');
            /*añadidos recientemente*/
            $table->date('fecha_incorporacion_institucion');
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
        Schema::dropIfExists('vehiculos');
    }
}
