<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosRonovableVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_ronovable_vehiculos', function (Blueprint $table) {
            $table->bigIncrements('archivero_id');
            $table->integer('gestion');
            $table->date('fecha_fin_cobertura_soat');
            $table->enum('bsisa',[0,1]);
            $table->enum('inspeccion_vehicular',[0,1]);
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
        Schema::dropIfExists('documentos_ronovable_vehiculos');
    }
}
