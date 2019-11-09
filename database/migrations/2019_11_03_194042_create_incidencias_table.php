<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('incidencia_id');
            $table->string('placa_id',100);
            $table->bigInteger('ci');
            $table->string('tipo_incidencia_descripcion',191);
            $table->date('fecha_incidencia');
            $table->string('vehiculo_en_movimiento'); /*0,1*/
            $table->string('lugar_incidencia',191);
            $table->string('descripcion',191);
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
        Schema::dropIfExists('incidencias');
    }
}
