@extends('layouts.layoutmaster')
@section('title')
    REGISTRAR ESTADO VEHICULO
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

    <div class="block shadow p-2 mb-1 rounded " data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">CREAR HISTORIAL ESTADO DE SERVICIO DEL VEHICULO</h3>
        </div>
        <div class="block-content">

            <form action="{{route('estservvehi.store')}}" method="POST" id="form_subir_estado_servicio_vehicular">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col col-md-2">
                        <div class="form-group">
                            <label for="placa_id">PLACA:<span class="text-danger">*</span></label>
                            <select class="js-select2 form-control" id="placa_id" name="placa_id"
                                    style="width: 100%;" data-placeholder="Escoger...">
                                <option></option>
                                <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                @foreach($placas as $filaplaca)
                                    <option
                                        value="{{$filaplaca->placa_id}}">{{$filaplaca->placa_id}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col col-md-3 text-sm-center">
                        <div class="form-group">
                            <label for="fecha_inicio">DESDE LA FECHA:</label>
                            <input type="text" class="js-flatpickr form-control bg-white"
                                   id="fecha_inicio"
                                   name="fecha_inicio" placeholder="Año-mes-dia"
                                   data-date-format="Y-m-d">
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="form-group">
                            <label>SERVICIO:</label>
                            <div class="custom-control custom-switch custom-control-lg mb-2">
                                <label>OFF</label>
                                <input type="checkbox" class="custom-control-input" id="est_id" name="est_id" value="
                                @if(isset($datosestado))
                                @if($datosestado[0]->est_descripcion == "EN SERVICIO")
                                {{$datosestado[0]->est_id}}
                                @else
                                @if($datosestado[1]->est_descripcion == "EN SERVICIO")
                                {{$datosestado[1]->est_id}}
                                @endif
                                @endif
                                @endif
                                    ">
                                <label class="custom-control-label" for="est_id">ON</label>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5">
                        <div class="form-group">
                            <label for="motivo">MOTIVO:</label>
                            <input type="text" name="motivo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded" style="float: right"
                                    id="guardar_estado_servicio_vehiculo">
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_est_serv_vehicular"></div>
    </div>

    <!-- END Flatpickr Datetimepicker -->
    <div class="block shadow p-2 mb-1 rounded d-none" data-toggle="appear" data-class="animated bounceIn"
         id="ultimo_estado_servicio_vehiculo_placa">
        <div class="block-content block-content-full">
            <div class="row push">
                <div class="col-md-12  shadow p-2 mb-1 rounded">
                    <h3 class="content-heading border-bottom mb-4 pb-2">ESTADO SERVICIO DE VEHICULO (ULTIMO REGISTRO EN
                        BASE DE DATOS)
                    </h3>
                    <div class="form-group">
                        <div class="row">
                            <div class="col col-md-2">
                                <div class="form-group">
                                    <label for="history1">PLACA: </label>
                                    <div id="input-placa-id"></div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="history1">DESDE LA FECHA: </label>
                                    <div id="input-fecha-inicio"></div>

                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="history1">ESTADO DE SERVICIO: </label>
                                    <div id="input-estado-serv-vehi"></div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="history1">MOTIVO: </label>
                                <div id="input-motivo"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        /*JQUERY PARA ENVIAR FORM ESTADO SERVICIO DE VEHICULO*/
        $('#form_subir_estado_servicio_vehicular').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#boton_exito').click();
                    $('#mensaje_respuesta_form_subir_est_serv_vehicular').append(
                        "<div class='alert alert-success d-flex align-items-center' role='alert'>" +
                        "<div class='flex-00-auto'>" +
                        "<i class='fa fa-fw fa-check'></i>" +
                        "</div>" +
                        "<div class='flex-fill ml-3'>" +
                        "<p class='mb-0'>" + data + " <a class='alert-link' href='javascript:void(0)'></a>!</p>" +
                        "</div>"
                    );
                    /*ocultar la seccion de ULTIMO ESTADO DE SERVICIO DE ESTA PLACA*/
                    $('#ultimo_estado_servicio_vehiculo_placa').addClass('d-none');
                }
            });
            return false;
        });

        /*CONSULTAR DIRECTAMENTE POR PLACA EL ULTIMO ESTADO DE SERVICIO POR PLACA SELECCIONADA*/
        $("#placa_id").change(function () {
                $.ajax(
                    {
                        method: 'POST',
                        url: "{{route('estservvehi.consulta')}}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'placa_id': $('#placa_id').val()
                        },
                        success: function (data) {
                            var colorMensaje = "";
                            for (var dato in data) {
                                /*## VISIBLIZAMOS LA SECCION DE ULTIMO ETADO DE SERVICIO PARA ESTA PLACA*/
                                $('#ultimo_estado_servicio_vehiculo_placa').removeClass('d-none');

                                $('#input-placa-id').children().remove();
                                $('#input-placa-id').append("<input type='text' value='" + data[dato].placa_id + "' " +
                                    "class='form-control' >");

                                $('#input-fecha-inicio').children().remove();
                                $('#input-fecha-inicio').append("<input type='text' value='" + data[dato].fecha_inicio + "' " +
                                    "class='form-control' >");

                                {{--{{$estadoservvehi[0]->est_descripcion == 'EN SERVICIO'? 'btn-success':'btn-danger'}}--}}
                                if (data[dato].est_descripcion == "EN SERVICIO") {
                                    colorMensaje = "btn-success";
                                } else {
                                    colorMensaje = "btn-danger";
                                }
                                $('#input-estado-serv-vehi').children().remove();
                                $('#input-estado-serv-vehi').append("<input type='text' value='" + data[dato].est_descripcion + "' " +
                                    "class='form-control btn " + colorMensaje + "' style='height: 100%;' >");

                                $('#input-motivo').children().remove();
                                $('#input-motivo').append("<input type='text' value='" + data[dato].motivo + "' " +
                                    "class='form-control' >");
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



