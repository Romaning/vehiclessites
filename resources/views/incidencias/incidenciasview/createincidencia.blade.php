@extends('layouts.layoutmaster')
@section('title')
    REGISTRAR INCIDENCIA
@endsection
@section('styles')
    {{--#################### START CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_css')
    {{--#################### END CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--##################### START CAROUSEL CSS #####################--}}
    @include('components.links_css_js.carousel.carousel_css')
    {{--##################### END CAROUSEL CSS #####################--}}

@endsection

{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Registrar Incidencia')
        <li class="breadcrumb-item">SECCION 3</li>
        <li class="breadcrumb-item">INCIDENCIAS</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Form Registar Incidencia</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}

@section('hero_cuadro_bienvenida')

@endsection
@section('content')
    @include('components.alerts.alerttre')

    @if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{csrf_field()}}
    <!-- Basic -->

    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">FORMULARIO</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('incidencia.store')}}" method="POST" enctype="multipart/form-data"
                  id="form_subir_incidencia">
                @csrf
                @method('POST')
                {{-- ############### FORMULARIO EN EL CENTRO ############--}}

                <div class="row push">
                    <div class="col-lg-3" id="section_izquierda"></div>
                    <div class="col-lg-6" id="section_centro">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="placa_id">PLACA: <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control js-maxlength" id="placa_id"
                                            maxlength="100" data-always-show="true"
                                            data-placement="top"
                                            name="placa_id"
                                            style="width: 100%;" data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datosvehiculos as $filavehiculo)
                                            <option
                                                value="{{$filavehiculo->placa_id}}">{{$filavehiculo->placa_id}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ci">CI CONDUCTOR DIA INCIDENCIA: <span
                                            class="text-danger">*</span></label>
                                    <select class="js-select2 form-control" id="ci" name="ci"
                                            style="width: 100%;" data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datosfuncionarios as $filafuncionario)
                                            <option
                                                value="{{$filafuncionario->ci}}">{{$filafuncionario->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_incidencia_descripcion">TIPO INCIDENCIA: <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control" id="tipo_incidencia_descripcion"
                                            name="tipo_incidencia_descripcion"
                                            style="width: 100%;" data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datostipoincidencias as $filatipoincidencia)
                                            <option value="{{$filatipoincidencia->tipo_incidencia_descripcion}}">
                                                {{$filatipoincidencia->tipo_incidencia_descripcion}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_incidencia">FECHA INCIDENCIA: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="js-flatpickr form-control bg-white"
                                           id="fecha_incidencia"
                                           name="fecha_incidencia"
                                           placeholder="Año-mes-dia"
                                           data-date-format="Y-m-d" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <label>VEHICULO EN MOVIMIENTO: </label>
                                    <div class="custom-control custom-switch custom-control-lg mb-2">
                                        <label>NO</label>
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="vehiculo_en_movimiento"
                                               name="vehiculo_en_movimiento"
                                               value="SI">
                                        <label class="custom-control-label" for="vehiculo_en_movimiento">SI</label>
                                    </div>
                                </div>
                            </div>
                            <div {{--class="col-md-6"--}}></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="lugar_incidencia">LUGAR DE INCIDENCIA:</label>
                                    <input type="text"
                                           name="lugar_incidencia"
                                           id="lugar_incidencia"
                                           class="form-control js-maxlength"
                                           maxlength="191" data-always-show="true"
                                           data-placement="top">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="descripcion">DESCRIPCION:</label>
                                    <textarea name="descripcion" id="descripcion"
                                              class="form-control js-maxlength"
                                              maxlength="191" data-always-show="true"
                                              data-placement="top"
                                              {{--cols="30"--}} rows="5">
                                    </textarea>
                                </div>
                                <div class="col-log-12">
                                    <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                            style="float: right; /*width: 100%*/">
                                        GUARDAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3" id="section_derecha">
                        <div class="block shadow p-2 mb-1 rounded d-none" id="section_asignado_vehiculo"
                             data-toggle="appear" data-class="animated bounceIn">
                            <div class="block-header">
                                <h3 class="block-title">
                                    <i class="fa fa-play fa-fw text-primary"></i>
                                    FUNCIONARIO ASIGNADO A VEHICULO
                                    <div id="placa_info"></div>
                                </h3>
                                <div id="boton_ir_asignacion">

                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div id="fecha_asignacion">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="apellidos_nombres">APELLIDOS Y NOMBRES: </label>
                                                    <input type="text"
                                                           value=""
                                                           id="apellidos_nombres"
                                                           class="form-control btn-success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="numero_licencia">NUMERO DE LICENCIA: </label>
                                                    <input type="text" name="" id="numero_licencia"
                                                           value=""
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label for="categoria_licencia">CAT: </label>
                                                    <input type="text" name="" id="categoria_licencia"
                                                           value=""
                                                           class="form-control text-center">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="ci_informacion">CI: </label>
                                                    <input type="text" name=""
                                                           id="ci_informacion" value=""
                                                           class="form-control btn-info">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ci_exped_en">EXP: </label>
                                                    <input type="text" name="" id="ci_exped_en"
                                                           value=""
                                                           class="form-control text-center">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tipo_conductor_chofer">TIPO: </label>
                                                    <input type="text" name=""
                                                           id="tipo_conductor_chofer"
                                                           value=""
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="identificador_memorandum">IDENTIFICADOR MEMO: </label>
                                                    <input type="text" name=""
                                                           id="identificador_memorandum"
                                                           value=""
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id=""></div>
                        </div>
                    </div>
                </div>

                {{--<div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                    style="float: right; width: 100%">
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </div>--}}
            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_incidencia"></div>
    </div>

    {{--###############################################################################################################--}}

    <div class="block shadow p-2 mb-1 rounded d-none" id="mensaje_no_existe_asignacion" data-toggle="appear"
         data-class="animated bounceIn">
        <div class="row">
            <div class="col-lg-12 text-center justify-content-center">
                <label for="" class="btn btn-danger">
                    <span class="font-italic">NO EXISTE ASIGNACION</span>
                </label>
            </div>
        </div>
    </div>

    {{--########################################  ######################################--}}

    {{--###############################################################################################################--}}

    <div class="d-none">
        <button type="button" class="js-swal-success btn btn-light push" id="boton_exito">
            <i class="fa fa-check-circle text-success mr-1"></i> Launch Dialog
        </button>
    </div>
@endsection
@section('js_script_import')
    {{--############################ START SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_js')
    {{--############################ END SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--###################### START SCRIPT JS CARROUSEL ####################--}}
    @include('components.links_css_js.carousel.carousel_js')
    {{--###################### END SCRIPT JS CARROUSEL ####################--}}

    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ SCRIPT PERSONAL $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}

    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
        console.log(APP_URL);
        /*CONSULTAR DIRECTAMENTE POR PLACA EL ULTIMO ESTADO DE SERVICIO POR PLACA SELECCIONADA*/
        $("#placa_id").change(function () {
                $.ajax(
                    {
                        method: 'POST',
                        url: "{{route('incidencia.consulta')}}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'placa_id': $('#placa_id').val()
                        },
                        success: function (data) {
                            $('#section_asignado_vehiculo').addClass('d-none')
                            var colorMensaje = "";
                            for (var dato in data) {
                                $('#section_izquierda').removeClass('col-lg-3');
                                $('#section_centro').removeClass('col-lg-6');
                                $('#section_derecha').removeClass('col-lg-3');

                                $('#section_izquierda').addClass('col-lg-0');
                                $('#section_centro').addClass('col-lg-6');
                                $('#section_derecha').addClass('col-lg-6');

                                $('#section_asignado_vehiculo').removeClass('d-none');
                                $('#placa_info').text(data[dato].placa_id);
                                $('#boton_ir_asignacion').children().remove();
                                $('#boton_ir_asignacion').append(
                                    "<a href='" + APP_URL + "/asignacion/" + data[dato].asignacion_id + "' class='btn btn-info shadow'>IR A</a>"
                                );
                                $('#fecha_asignacion').children().remove();
                                $('#fecha_asignacion').append(
                                    "<label for=''>FECHA DE ASIGNACION: </label>" +
                                    "<input type='text' class='js-flatpickr form-control bg-white'" +
                                    "id='' name='' " +
                                    "value=' " + data[dato].fecha_asignacion + " '" +
                                    "data-inline='true'" +
                                    "placeholder='Año-mes-dia'" +
                                    "data-date-format='Y-m-d'>"
                                );
                                $('#apellidos_nombres').val(data[dato].apellidos + ' ' + data[dato].nombres);
                                $('#numero_licencia').val(data[dato].numero_licencia);
                                $('#categoria_licencia').val(data[dato].categoria_licencia);
                                $('#ci_informacion').val(data[dato].ci);
                                $('#ci_exped_en').val(data[dato].ci_exped_en);
                                $('#tipo_conductor_chofer').val(data[dato].tipo_conductor_chofer);
                                $('#identificador_memorandum').val(data[dato].identificador_memorandum);

                                /*## VISIBLIZAMOS LA SECCION DE ULTIMO ETADO DE SERVICIO PARA ESTA PLACA*/
                                /* $('#ultimo_estado_servicio_vehiculo_placa').removeClass('d-none');

                                 $('#input-placa-id').children().remove();
                                 $('#input-placa-id').append("<input type='text' value='" + data[dato].placa_id + "' " +
                                     "class='form-control' >");

                                 $('#input-fecha-inicio').children().remove();
                                 $('#input-fecha-inicio').append("<input type='text' value='" + data[dato].fecha_inicio + "' " +
                                     "class='form-control' >");*/

                                {{--{{$estadoservvehi[0]->est_descripcion == 'EN SERVICIO'? 'btn-success':'btn-danger'}}--}}
                                /*if (data[dato].est_descripcion == "EN SERVICIO") {
                                    colorMensaje = "btn-success";
                                } else {
                                    colorMensaje = "btn-danger";
                                }
                                $('#input-estado-serv-vehi').children().remove();
                                $('#input-estado-serv-vehi').append("<input type='text' value='" + data[dato].est_descripcion + "' " +
                                    "class='form-control btn " + colorMensaje + "' style='height: 100%;' >");

                                $('#input-motivo').children().remove();
                                $('#input-motivo').append("<input type='text' value='" + data[dato].motivo + "' " +
                                    "class='form-control' >");*/
                            }
                        }
                        /*$('#mensaje_respuesta_form_subir_est_serv_vehicular').children().remove();*/
                        /*$('#boton_exito').click();*/
                    }
                );
            }
        );
        /*alert($('select[name=color1]').val());
        $('input[name=valor1]').val($(this).val());*/
    </script>

@endsection

