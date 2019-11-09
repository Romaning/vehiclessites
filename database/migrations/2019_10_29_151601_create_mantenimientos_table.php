<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.

     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('mantenimiento_id');
            $table->string('mant_id_ini_asign',191)->nullable();
            $table->date('fecha_inicio_mant')->nullable();
            $table->string('placa_id_mant',100);
            $table->string('detalle_mant',191)->nullable();
            $table->string('tipo_mant',191);
            $table->string('empresa_encargada_mant',191)->nullable();

            $table->string('mant_id_fin_asign',191)->nullable();
            $table->date('fecha_fin_mant')->nullable();
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
        Schema::dropIfExists('mantenimientos');
    }
}
