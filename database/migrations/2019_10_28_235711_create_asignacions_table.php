<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacions', function (Blueprint $table) {
            $table->bigIncrements('asignacion_id');
            $table->string('coord_asig',191)->nullable();
            $table->string('coord_devo',191)->nullable();
            $table->string('identificador_memorandum',191);
            $table->string('archivo_memorandum',191)->nullable();
            $table->date('fecha_asignacion');
            $table->bigInteger('ci');
            $table->string('placa_id',100);
            $table->string('tipo_conductor_chofer',191);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    /*
     *Request {#52 ▼
  #json: null
  #convertedFiles: null
  #userResolver: Closure($guard = null) {#30 ▶}
  #routeResolver: Closure() {#347 ▶}
  +attributes: ParameterBag {#54 ▶}
  +request: ParameterBag {#53 ▼
    #parameters: array:7 [▼
      "_token" => "PJ1pqtbxtBnHeDAZVqAA4rEtiOTPqlDIZOEaWxXt"
      "_method" => "POST"
      "placa_id" => "1147DEK"
      "ci" => "10037191"
      "fecha_asignacion" => "2019-10-29"
      "identificador_memorandum" => "A12312312"
      "tipo_conductor_chofer" => "CONDUCTOR"
    ]
  }
  +query: ParameterBag {#60 ▶}
  +server: ServerBag {#57 ▶}
  +files: FileBag {#56 ▼
    #parameters: array:1 [▼
      "archivo_memorandum" => UploadedFile {#41 ▶}
    ]
  }
     * */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacions');
    }
}
