<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoCombustiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_combustibles', function (Blueprint $table) {
            /*ATRIBUTOS*/
            $table->bigIncrements('tipo_combustible_id');
            $table->string('tipo_combustible_descripcion',100);
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
        Schema::dropIfExists('tipo_combustibles');
    }
}
