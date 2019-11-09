@extends('layouts.layoutmaster')
@section('title')
    CAMBIO DE ESTADO VEHICULO
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
        @slot('titulo1','Registrar Estado Servicio Vehiculo')
        <li class="breadcrumb-item">SECCION 2</li>
        <li class="breadcrumb-item">VEHICULOS</li>
        <li class="breadcrumb-item">Historial de Estados de Vehiculos</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Form Registrar</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('hero_cuadro_bienvenida')

@endsection
@section('content')

    @include('components.alerts.alerttre')

    <!-- Basic -->
    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">

        <div class="block-header">
            <h3 class="block-title">Formulario</h3>
        </div>

        <form action="{{route('estservvehi.storesolo')}}" method="POST"
              id="form_subir_estado_servicio_vehicular" class="col-md-12 shadow p-2 mb-1 rounded">
            @csrf
            @method('post')
            <h3 class="content-heading border-bottom mb-4 pb-2">CAMBIAR ESTADO SERVICIO DE VEHICULO (PARA ULTIMO REGISTRO EN
                BASE DE DATOS)
            </h3>
            <div class="row">
                <div class="col col-md-2">
                    <div class="form-group">
                        <label for="placa_id">PLACA: <span class="text-danger">*</span></label>
                        <input type="text" name="placa_id" id="" class="btn btn-success" value="{{$placa_id}}">
                    </div>
                </div>
                <div class="col col-md-3 text-sm-center">
                    <div class="form-group">
                        <label for="fecha_inicio">FECHA INICIO: </label>
                        <input type="text" class="js-flatpickr form-control bg-white"
                               id="fecha_inicio"
                               name="fecha_inicio" placeholder="Año-mes-dia"
                               data-date-format="Y-m-d" value="{{date('Y-m-d')}}">
                    </div>
                </div>
                <div class="col col-md-2">
                    <div class="form-group">
                        <label>ESTADO SERVICIO: </label>
                        <div class="custom-control custom-switch custom-control-lg mb-2">
                            <label>OFF</label>
                            <input type="checkbox" class="custom-control-input" id="est_id" name="est_id"
                                   value="
                                @if($datosestado[0]->est_descripcion == "EN SERVICIO")
                                   {{$datosestado[0]->est_id}}
                                   @else
                                   @if($datosestado[1]->est_descripcion == "EN SERVICIO")
                                   {{$datosestado[1]->est_id}}
                                   @endif
                                   @endif
                                       ">
                            <label class="custom-control-label" for="est_id">ON</label>
                        </div>
                    </div>
                </div>
                <div class="col col-md-5">
                    <div class="form-group">
                        <label for="motivo">MOTIVO: </label>
                        <input type="text" name="motivo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                style="float: right"
                                id="guardar_estado_servicio_vehiculo">
                            GUARDAR
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div id="mensaje_respuesta_subir_estado_servicio_vehicular"></div>


        <div class="block-content block-content-full">
            <div class="row push">
                <div class="col-md-12  shadow p-2 mb-1 rounded">
                    <h3 class="content-heading border-bottom mb-4 pb-2">ESTADO SERVICIO DE VEHICULO (ULTIMO REGISTRO EN
                        BASE DE DATOS)
                    </h3>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fecha_inicio_est_serv_vehi">FECHA INICIO: </label>
                                    <input type="text" name="fecha_inicio" id="fecha_inicio_est_serv_vehi"
                                           value="{{$estadoservvehi[0]->fecha_inicio}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="estado_service">ESTADO DE SERVICIO: </label>
                                    <input type="text" name="estado_service" id="estado_service"
                                           value="{{$estadoservvehi[0]->est_descripcion}}"
                                           class="form-control btn {{$estadoservvehi[0]->est_descripcion == "EN SERVICIO"? "btn-success":"btn-danger"}}"
                                           style="height: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="motivo">MOTIVO: </label>
                                <input type="text" name="motivo" id="motivo_est_serv_vehi"
                                       value="{{$estadoservvehi[0]->motivo}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END Basic -->

    {{--###############################################################################################--}}
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

    {{--############################################## JS #############################################--}}
    {{--#######################################################################################################--}}
    <script>
        /*JQUERY PARA ENVIAR FORM DE DOCUEMENTOS RENOVABLES*/
        $('#form_subir_estado_servicio_vehicular').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#boton_exito').click();
                    $('#mensaje_respuesta_subir_estado_servicio_vehicular').append(
                        "<div class='alert alert-success d-flex align-items-center' role='alert'>" +
                        "<div class='flex-00-auto'>" +
                        "<i class='fa fa-fw fa-check'></i>" +
                        "</div>" +
                        "<div class='flex-fill ml-3'>" +
                        "<p class='mb-0'>" + data + " <a class='alert-link' href='javascript:void(0)'></a>!</p>" +
                        "</div>"
                    );
                }
            });
            return false;
        });
    </script>
@endsection
