<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
    ci	bigInt(20)	NOT NULL
    ci_exped_en_id	bigInt(20)	NOT NULL
    nombres	string(191)	NOT NULL
    apellidos	string(191)	NOT NULL
    fecha_nac	date	NULLABLE
    categoria_licencia_id	bigInt(20)	NOT NULL
    numero_licencia	string(191)	NOT NULL(UNIQ)
    fecha_expedicion_licencia	date	NOT NULL
    fecha_vencimiento_licencia	date	NOT NULL
    numero_accidentes	int(11)	NULLABLE
    estado_func_id	bigInt(20)	NOT NULL
    departamento_id	bigInt(20)	NULLABLE
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigInteger('ci')->primary();
            $table->string('ci_exped_en',4); /**/
            $table->string('apellidos',191);
            $table->string('nombres',191);
            $table->date('fecha_nac')->nullable();
            $table->string('categoria_licencia',4)->nullable();/**/
            $table->string('numero_licencia',191)->nullable();
            $table->date('fecha_expedicion_licencia')->nullable();
            $table->date('fecha_vencimiento_licencia')->nullable();
            $table->integer('numero_accidentes')->nullable();
            $table->string('contacto',191)->nullable();
            $table->string('imagen_perfil',191)->nullable();
            $table->string('estado_func_descripcion',191);        /* para la TABLA*/
            $table->bigInteger('departamento_id');       /* para la TABLA*/
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
        Schema::dropIfExists('funcionarios');
    }
}
