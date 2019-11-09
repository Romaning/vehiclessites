<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfraccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infraccions', function (Blueprint $table) {
            $table->bigIncrements('infraccion_id');
            $table->string('placa_id',100);
            $table->integer('gestion');
            $table->date('fecha_infraccion');
            $table->string('serie')->nullable();
            $table->string('boleta')->nullable();
            $table->string('condigo')->nullable();
            $table->string('descripcion')->nullable();
            $table->float('monto')->nullable();
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
        Schema::dropIfExists('infraccions');
    }
}
