<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucions', function (Blueprint $table) {
            $table->bigIncrements('devolucion_id');
            $table->string('coord_devo',191)->nullable();
            $table->string('coord_asig',191)->nullable();
            $table->string('identificador_acta_devolucion',191)->nullable();
            $table->string('archivo_acta_devolucion',191)->nullable();
            $table->date('fecha_devolucion');
            $table->bigInteger('ci');
            $table->string('placa_id',100);
            $table->string('motivo_devolucion',191);
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
        Schema::dropIfExists('devolucions');
    }
}












