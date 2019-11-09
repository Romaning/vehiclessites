@extends('layouts.layoutmaster')
@section('title')
EDITAR DEPARTAMENTO
@endsection
@section('styles')
    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Editar Departamento')
        <li class="breadcrumb-item">SECCION 1</li>
        <li class="breadcrumb-item">DEPARTAMENTOS</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Editar Departamentos</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('hero_cuadro_bienvenida')
    <!-- Hero -->

    <!-- END Hero -->
    {{--@include('componentes.4_A_Hero(otrabienvenida)')--}}
@endsection
@section('content')
    @include('components.alerts.alerttre')
    <!-- Basic -->
    <div class="block shadow p-2 mb-1 rounded">
        <div class="block-header">
            <h3 class="block-title">Formulario</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('departamento.update',$datosdepartamentos[0]->departamento_id)}}" method="POST" enctype="multipart/form-data" id="form_subir_departamento">
                @csrf
                @method('PUT')
                <div class="row push">

                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted">
                            DEPARTAMENTOS
                        </p>
                    </div>
                    {{-- main --}}
                    <div class="col-lg-8 col-xl-5">

                        <div class="form-group">
                            <label for="departamento_nombre">NOMBRE DE DEPARTAMENTO: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="departamento_nombre" name="departamento_nombre" placeholder=""
                                   value="{{$datosdepartamentos[0]->departamento_name}}" required>
                        </div>

                        {{--<div class="form-group">
                            <label for="depende_id">DENPENDE DE:</label>
                            <input type="text" class="form-control" id="depende_id" name="depende_id" placeholder=""
                                   value="{{$datosdepartamentos[0]->depende_id}}" required>
                        </div>
                        <div class="form-group">
                            <label for="depende_id">DENPENDE DE:</label>
                            <select class="js-select2 form-control" id="depende_id" name="depende_id"
                                    style="width: 100%;" data-placeholder="Escoger...">
                                <option></option>
                                @foreach($departamentos as $fila)
                                    <option
                                        value="{{$fila->departamento_id}}">{{$fila->departamento_nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>--}}
                        <div class="form-group">
                            <label for="depende_id">DENPENDE DE:</label>
                            <select class="js-select2 form-control" id="depende_id" name="depende_id"
                                    style="width: 100%;" data-placeholder="Escoger...">
                                <option></option>
                                @foreach($departamentos as $departamento)
                                    <option
                                        value="{{$departamento->departamento_id}}" {{$departamento->departamento_id == $datosdepartamentos[0]->depende_id ? "selected":""}}>
                                        {{$departamento->departamento_nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jefe_id">INGRESE CI DEL LIDER </label>
                            <input type="text" class="form-control" id="jefe_id" name="jefe_id" placeholder=""
                                   value="{{$datosdepartamentos[0]->jefe_id}}">
                        </div>

                        <div class="form-group">
                            <label for="">NOMBRE DEL LIDER </label>
                            <input type="text" class="form-control" id="" name="" placeholder="" disabled
                                   value="{{$datosdepartamentos[0]->jefe_id}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                GUARDAR
                            </button>
                        </div>

                    </div>
                    {{--end Main--}}
                </div>
            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_departamento"></div>

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
    {{-- ################ START SCRIPTS###############--}}
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.js')}}"></script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function(){ One.helpers('select2'); });</script>
    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_forms_validation.min.js')}}"></script>

    {{-- ############################################## END SCRIPTS ############################################################--}}
    <script>
        /*JQUERY PARA ENVIAR FORM DE DOCUEMENTOS RENOVABLES*/
        $('#form_subir_departamento').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#boton_exito').click();
                    $('#mensaje_respuesta_form_subir_departamento').append(
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

