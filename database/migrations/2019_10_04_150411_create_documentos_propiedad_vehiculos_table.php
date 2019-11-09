<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosPropiedadVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_propiedad_vehiculos', function (Blueprint $table) {
            /*ATRIBUTOS*/
            $table->bigIncrements('id');
            $table->string('archivo_subido',191);
            $table->string('nombre_documento_propiedad',191);
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
        Schema::dropIfExists('documentos_propiedad_vehiculos');
    }
}
