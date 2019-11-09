<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamoDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamo_denuncias', function (Blueprint $table) {
            $table->bigIncrements('reclamo_denuncia_id');
            $table->string('ante_quien',191);
            $table->string('tipo_r_d_descripcion',191);
            $table->string('num_resolucion_inicio_proceso');
            $table->date('fecha_r_d_inicio');
            $table->string('archivo_inicio_proceso');
            $table->string('num_resolucion_fin_proceso');
            $table->date('fecha_r_d_fin');
            $table->string('archivo_fin_proceso');
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
        Schema::dropIfExists('reclamo_denuncias');
    }
}
