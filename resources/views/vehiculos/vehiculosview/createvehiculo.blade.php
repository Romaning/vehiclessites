@extends('layouts.layoutmaster')
@section('title')
    REGISTRAR VEHICULO
@endsection
@section('styles')
    {{--#################### START CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_css')
    {{--#################### END CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--##################### START CAROUSEL CSS #####################--}}
    @include('components.links_css_js.carousel.carousel_css')
    {{--##################### END CAROUSEL CSS #####################--}}

    <!-- Stylesheets -->
    <!-- Page CSS DIRECTO PARA SHOW VEHICULO -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/flatpickr/themes/material_green.css')}}">

@endsection
{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Registrar Vehiculo')
        <li class="breadcrumb-item">SECCION 2</li>
        <li class="breadcrumb-item">VEHICULOS</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Vehiculo</a>
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
            <h3 class="block-title">FORMULARIO</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('vehiculo.store')}}" method="POST"
                  enctype="multipart/form-data" {{--onsubmit="return false;"--}} id="form_subir_datos_vehiculo">
                @csrf
                @method('POST')
                {{--#################################################################--}}
                <div class="col-lg-4">
                    <p class="font-size-sm text-muted">
                        INGRESE VEHICULO
                    </p>
                </div>
                <div class="row push">
                    <div class="col-lg-8 ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="placa_id">PLACA: <span class="text-danger">*</span></label>
                                    <input type="text" class="js-maxlength form-control" id="placa_id" name="placa_id"
                                           onchange="asignarPlacaIdATodaLaPagina()" maxlength="10"
                                           data-always-show="true" data-placement="top" required>
                                </div>
                                <div class="col">
                                    <label for="numero_crpva">RCPVA: <span class="text-danger">*</span></label>
                                    <input type="text" class="js-maxlength form-control" id="numero_crpva"
                                           name="numero_crpva" maxlength="20" data-always-show="true"
                                           data-placement="top" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="numero_chasis">NUMERO CHASIS: <span class="text-danger">*</span></label>
                                    <input type="text" class="js-maxlength form-control" id="numero_chasis"
                                           name="numero_chasis"
                                           maxlength="20" data-always-show="true"
                                           data-placement="top"
                                           required>
                                </div>
                                <div class="col">
                                    <label for="numero_motor">NUMERO MOTOR: <span class="text-danger">*</span></label>
                                    <input type="text" class="js-maxlength form-control" id="numero_motor"
                                           name="numero_motor"
                                           maxlength="20" data-always-show="true"
                                           data-placement="top"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="documento_importacion">DOCUMENTO DE IMPORTACION: </label>
                                    <input type="text" class="js-maxlength form-control" id="documento_importacion"
                                           maxlength="100" data-always-show="true"
                                           data-placement="top"
                                           name="documento_importacion">
                                </div>
                                <div class="col">
                                    <label for="numero_documento_importacion">NUMERO DOCUMENTO IMPORTACION: </label>
                                    <input type="text" class="js-maxlength form-control"
                                           id="numero_documento_importacion"
                                           maxlength="20" data-always-show="true"
                                           data-placement="top"
                                           placeholder="Numeros..."
                                           pattern="[0-9]+"
                                           name="numero_documento_importacion">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="clase_id">CLASE: </label>
                                    <select class="js-select2 form-control" id="clase_id" name="clase_id"
                                            style="width: 100%;" data-placeholder="Escoger...">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datosclase as $filaclase)
                                            <option
                                                value="{{$filaclase->clase_id}}">{{$filaclase->clase_descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="marca_id">MARCA: </label>
                                    <select class="js-select2 form-control" id="marca_id" name="marca_id"
                                            style="width: 100%;" data-placeholder="Escoger...">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datosmarca as $filamarca)
                                            <option
                                                value="{{$filamarca->marca_id}}">{{$filamarca->marca_descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="tipo_id">TIPO: </label>
                                    <select class="js-select2 form-control" id="tipo_id" name="tipo_id"
                                            style="width: 100%;" data-placeholder="Escoger...">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datostipo as $filatipo)
                                            <option
                                                value="{{$filatipo->tipo_id}}">{{$filatipo->tipo_descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="tipo_combustible_id">TIPO COMBUSTIBLE: <span
                                            class="text-danger">*</span></label>
                                    <select class="js-select2 form-control" id="tipo_combustible_id"
                                            name="tipo_combustible_id" style="width: 100%;"
                                            data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datostipo_combustible as $filatipo_combustible)
                                            <option
                                                value="{{$filatipo_combustible->tipo_combustible_id}}">{{$filatipo_combustible->tipo_combustible_descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="color">COLOR: </label>
                                    <input type="text" class="js-maxlength form-control" id="color" name="color"
                                           maxlength="100" data-always-show="true"
                                           data-placement="top">
                                </div>
                                <div class="col">
                                    <label for="plazas">PLAZAS: </label>
                                    <input type="text" class="js-maxlength form-control btn-block js-tooltip-enabled"
                                           id="plazas" name="plazas" maxlength="11"
                                           data-always-show="true"
                                           data-placement="top" placeholder="Solo numeros..."
                                           pattern="[0-9]+"
                                           data-toggle="tooltip"
                                           data-original-title="Solo números">
                                </div>
                            </div>
                        </div>
                        {{--<button type="button" class="btn-block js-tooltip-enabled" data-toggle="tooltip" data-placement="top" title="" data-original-title="Top Tooltip">Top</button>--}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="ruedas">RUEDAS: <span class="text-danger">*</span></label>
                                    <input type="text" class="js-maxlength form-control btn-block js-tooltip-enabled"
                                           id="ruedas" name="ruedas" maxlength="11"
                                           data-always-show="true"
                                           data-placement="top" placeholder="Solo numeros..."
                                           data-toggle="tooltip"
                                           title="SOLO NUMEROS"
                                           pattern="[0-9]+"
                                           data-original-title="Solo números" required>
                                </div>
                                <div class="col">
                                    <label for="traccion">TRACCION: </label>
                                    <input type="text" class="js-maxlength form-control" id="traccion" name="traccion"
                                           maxlength="100" data-always-show="true"
                                           data-placement="top">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="tipo_uso_id">TIPO USO: <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control" id="tipo_uso_id" name="tipo_uso_id"
                                            style="width: 100%;" data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datostipo_uso as $filatipo_uso)
                                            <option
                                                value="{{$filatipo_uso->tipo_uso_id}}">{{$filatipo_uso->tipo_uso_descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="fecha_incorporacion_institucion">FECHA DE INCORPORACION A INSTITUCION:
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="js-flatpickr form-control bg-white"
                                           id="fecha_incorporacion_institucion"
                                           name="fecha_incorporacion_institucion" placeholder="Año-mes-dia"
                                           data-date-format="Y-m-d" required>
                                </div>
                            </div>
                        </div>

                        {{--#########################################################################--}}
                        <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded" style="float: right;"
                        onclick="habilitarBotones()">
                            GUARDAR
                        </button>
                    </div>
                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted">
                            PLACA: PUEDE CONTENER LETRAS, NUMEROS Y GUION
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_datos_vehiculo"></div>
    </div>
    <!-- END Basic -->

    <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.flatpickr()) -->
    <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
    <div class="block shadow p-2 mb-1 rounded " data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">SUBIR ESTADO DE SERVICIO DEL VEHICULO</h3>
        </div>
        <div class="block-content">
            <form action="{{route('estservvehi.store')}}" method="POST" id="form_subir_estado_servicio_vehicular">
                @csrf
                @method('POST')
                <input type="hidden" name="placa_id" value=""
                       id="placa_id_subida_estado_servicio_vehicular"> {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ placa oculta $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
                <div class="row">
                    {{--OPCION CODIGO 1--}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="fecha_inicio">DESDE LA FECHA <span class="text-danger">*</span></label>
                            <input type="text" class="js-flatpickr form-control bg-white"
                                   id="fecha_inicio"
                                   name="fecha_inicio" placeholder="Año-mes-dia"
                                   data-date-format="Y-m-d" required>
                        </div>
                    </div>

                    <div class="d-none">
                        <div class="form-group">
                            <label for="motivo">MOTIVO <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="motivo" name="motivo"
                                   value="Inicio de actividades">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <br>
                            <input type="text" name="est_id" value="1" class="d-none" id="est_id_id">
                            <div class="btn btn-success col-lg-12 form-control shadow p-2 mb-1 rounded"
                                 id="mensaje_de_est_serv_En_servicio" style="width: 100%;">
                                EN SERVICIO
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded" style="float: right;"
                                    id="guardar_estado_servicio_vehiculo" disabled>
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



    <!-- Slider with multiple images and center mode -->
    <div class="block shadow p-2 mb-1 rounded" id="bloque_docs_prop_vehiculo" data-toggle="appear"
         data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">
                <i class="fa fa-play fa-fw text-primary"></i>
                DOCUMENTOS DE PROPIEDAD VEHICULAR
                <button type="submit" class="btn btn-primary shadow p-2 mb-1 rounded"
                        id="btn_insertar_documentos_propiedad_vehiculo" style="float:right;">
                    INSERTAR
                </button>
            </h3>
        </div>
        <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-arrows="true"
             data-slides-to-show="3" data-center-mode="true" data-autoplay="true" data-autoplay-speed="3000">
            {{--<img class="img-fluid" src="{{asset('assets/media/photos/photo19@2x.jpg')}}" alt="">--}}
        </div>
    </div>
    <!-- END Slider with multiple images and center mode -->


    {{--SECCION DE SUBIDA DE IMAGENES DE DOCUMENTOS DE PROPIEDAD DEL VEHICULO (TODOS LOS PERFILES O ANGULOS)--}}
    <!-- Dropzone (functionality is auto initialized by the plugin itself in js/plugins/dropzone/dropzone.min.js) -->
    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
    <div class="block d-none shadow p-2 mb-1 rounded" id="bloque_subida_docs_prop_vehiculo" data-toggle="appear"
         data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">
                SUBIR DOCUMENTOS DE PROPIEDAD VEHICULAR
            </h3>
        </div>
        <div class="block-content block-content-full">
            <h2 class="content-heading border-bottom mb-4 pb-2">Subida de Archivos Asincrona</h2>
            <div class="row">
                <div class="{{--col-lg-8--}} col-lg-12 {{--col-xl-5--}}">
                    <!-- DropzoneJS Container -->
                    {{--<h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3>--}}
                    <div id="dropezone_docs_prop">
                        <form method="post" action="{{route('docsprop.storefilemet')}}" enctype="multipart/form-data"
                              class="dropzone" id="myDropzoneDocsProp">
                            @csrf
                            <input type="hidden" name="placa_id" value=""
                                   id="placa_id_subida_docs_prop_vehiculo"> {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ placa oculta $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
                            <div class="dz-message">
                                Sube Tus imagenes aquí
                            </div>
                            <div class="dropzone-previews"></div>
                        </form>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                        id="submit_docs_prop_vehiculo" style="float:right;" disabled>
                                    GUARDAR
                                </button>
                                <button type="submit" class="btn btn-danger shadow p-2 mb-1 rounded"
                                        id="btn_insertar_documentos_propiedad_vehiculo" style="float:right;">
                                    CANCELAR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="enfoque_zona_subir_docs_prop_vehiculo"></div>
        {{--<button type="submit" id="limpiar_seccion_dubida_fotos">LIMPIAR</button>--}}
    </div>
    <!-- END Dropzone -->


    <!-- Slider with multiple images and center mode -->
    <div class="block shadow p-2 mb-1 rounded" id="bloque_imgenes_perfil_vehiculo" data-toggle="appear"
         data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">
                <i class="fa fa-play fa-fw text-primary"></i>
                IMAGENES DE PERFIL VEHICULO
                <button type="submit" class="btn btn-primary shadow p-2 mb-1 rounded"
                        id="btn_insertar_imagenes_perfil_vehiculo" style="float: right;">
                    INSERTAR
                </button>
            </h3>
        </div>
        <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-arrows="true"
             data-slides-to-show="3" data-center-mode="true" data-autoplay="true" data-autoplay-speed="3000">
            {{--<img class="img-fluid" src="{{asset('assets/media/photos/photo19@2x.jpg')}}" alt="">--}}
        </div>
    </div>
    <!-- END Slider with multiple images and center mode -->



    {{--SECCION DE SUBIDA DE IMAGENES DEL VEHICULO (TODOS LOS PERFILES O ANGULOS)--}}
    <!-- Dropzone (functionality is auto initialized by the plugin itself in js/plugins/dropzone/dropzone.min.js) -->
    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
    <div class="block shadow p-2 mb-1 rounded d-none" id="bloque_subida_imagenes_perfil_vehiculo" data-toggle="appear"
         data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">SUBIR IMAGENES (DELANTERA, DERECHA, IZQUIERDA, ATRAS, Y OTROS) DEL VEHICULO</h3>
        </div>
        <div class="block-content block-content-full">
            <h2 class="content-heading border-bottom mb-4 pb-2">SUBIDA DE ARCHIVOS ASINCRONA</h2>
            <div class="row">
                <div class="{{--col-lg-8--}} col-lg-12 {{--col-xl-5--}}">
                    <!-- DropzoneJS Container -->
                    {{--<h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3>--}}
                    <div id="dropezone">
                        <form method="post" action="{{route('imgsperfil.storefilemet')}}" enctype="multipart/form-data"
                              class="dropzone" id="myDropzoneImgsPerfil">
                            @csrf
                            <input type="hidden" name="placa_id" value=""
                                   id="placa_id_subida_imgs_perfil_vehiculo">{{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ placa oculta $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
                            <div class="dz-message">
                                Sube Tus imagenes aquí
                            </div>
                            <div class="dropzone-previews"></div>
                        </form>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                        id="submit_imgs_perfil_vehiculo" style="float: right;" disabled>
                                    GUARDAR
                                </button>
                                <button type="submit" class="btn btn-danger shadow p-2 mb-1 rounded"
                                        id="btn_insertar_imagenes_perfil_vehiculo" style="float: right;">
                                    CANCELAR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="enfoque_zona_subir_imgs_perfil_vehiculo"></div>
        {{--<button type="submit" id="limpiar_seccion_dubida_fotos">LIMPIAR</button>--}}
    </div>
    <!-- END Dropzone -->


    <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.flatpickr()) -->
    <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">SUBIR DOCUMENTOS RENOVABLES DEL VEHICULO</h3>
        </div>
        <div class="block-content">

            <form action="{{route('docsrenov.store')}}" method="POST"
                  id="form_subir_docs_renov_vehicular">
                @csrf
                <input type="hidden" name="placa_id" value=""
                       id="placa_id_subida_docs_renov_vehicular"> {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ placa oculta $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="gestion_var_front">GESTION: <span class="text-danger">*</span></label>
                            <input type="text" value="{{ date('Y') }}" name="gestion" class="form-control" pattern="[0-9]+">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-flatpickr-custom">FECHA FIN COBERTURA DE SOAT: <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="fecha_fin_cobertura_soat"
                                   name="fecha_fin_cobertura_soat" placeholder="Año-mes-dia" data-date-format="Y-m-d">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>B-SISA: </label>
                            <div class="custom-control custom-switch custom-control-lg mb-2">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom-lg1"
                                       name="bsisa" value="1">
                                <label class="custom-control-label" for="example-sw-custom-lg1">SI</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>INSPECCION VEHICULAR: </label>
                            <div class="custom-control custom-switch custom-control-lg mb-2">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom-lg2"
                                       name="inspeccion_vehicular" value="1">
                                <label class="custom-control-label" for="example-sw-custom-lg2">SI</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded" style="float: right"
                            id="btn_guardar_form_subida_doc_renov" disabled>
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_docs_renov_vehicular"></div>
    </div>
    <!-- END Flatpickr Datetimepicker -->



    <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.flatpickr()) -->
    <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">
                SUBIR SEGUROS
                <button id="btn_generar_filas" class="btn btn-primary shadow rounded"
                        style="float: right; justify-content: end;">
                    <i class="fas fa-plus-circle"></i> GENERAR CAMPOS
                </button>
            </h3>
        </div>

        <div class="block-content">
            <form action="{{route('seguro.store')}}" method="POST" id="form_subir_seguros"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                {{--<input type="hidden" name="placa_id" value="" class="placa_id_subir_seguro"
                       id="placa_id_subir_seguro"> --}}{{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ placa oculta $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
                <table class="table table-bordered table-striped table-vcenter{{-- js-dataTable-buttons--}}">
                    <thead>
                    <tr>
                        <th class="d-none"></th>
                        <th class="d-none d-sm-table-cell">GESTION</th>
                        <th class="d-none d-sm-table-cell">DESCRIPCION</th>
                        <th class="d-none d-sm-table-cell">EMPRESA ASEGURADORA</th>
                        <th class="d-none d-sm-table-cell">FECHA DE VIGENCIA</th>
                        <th class="d-none d-sm-table-cell" style="width: 13%;">ARCHIVOS SUBIDOS</th>
                        <th style="width:3%;" class="text-sm-center">
                        </th>
                    </tr>
                    </thead>
                    <tbody id="body_tb_form_in">


                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary shadow rounded" style="float: right;"
                        id="btn_guardar_form_subida_seguro" disabled>GUARDAR
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <div id="mensaje_respuesta_form_subir_seguros"></div>
        @if(session()->has('alert-seguro'))
            <div class='alert alert-success d-flex align-items-center' role='alert'>
                <div class='flex-00-auto'>
                    <i class='fa fa-fw fa-check'></i>
                </div>
                <div class='flex-fill ml-3'>
                    <p class='mb-0'>  {{ session()->get('alert-seguro') }}<a class='alert-link'
                                                                             href='javascript:void(0)'></a>!</p>
                </div>
            </div>
        @endif
    </div>
    <!-- END Flatpickr Datetimepicker -->

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

    {{-- ############################################### END SCRIPTS PARA DROPZONE ######################################################--}}
    <script>
        function asignarPlacaIdATodaLaPagina() {
            placavehiculo = $('#placa_id').val();

            $('#placa_id_subida_docs_prop_vehiculo').val(placavehiculo);
            $('#placa_id_subida_imgs_perfil_vehiculo').val(placavehiculo);
            $('#placa_id_subida_docs_renov_vehicular').val(placavehiculo);
            $('#placa_id_subir_seguro').val(placavehiculo);
            $('#placa_id_subida_estado_servicio_vehicular').val(placavehiculo);
        }

        function habilitarBotones(){
            $("#btn_guardar_form_subida_seguro").prop('disabled', false);
            $("#btn_guardar_form_subida_doc_renov").prop('disabled', false);
            $("#submit_imgs_perfil_vehiculo").prop('disabled', false);
            $("#submit_docs_prop_vehiculo").prop('disabled', false);
            $("#guardar_estado_servicio_vehiculo").prop('disabled', false);
        }

        /*JQUERY PARA ENVIAR FORM DE DATOS VEHICULO*/
        $('#form_subir_datos_vehiculo').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#boton_exito').click();
                    $('#mensaje_respuesta_form_subir_datos_vehiculo').append(
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

        /*JQUERY PARA ENVIAR FORM ESTADO SERVICIO DE VEHICULO*/
        $('#form_subir_estado_servicio_vehicular').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#mensaje_respuesta_form_subir_est_serv_vehicular').append(
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
        /*para subir documentos de vehiculo*/
        Dropzone.options.myDropzoneDocsProp = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 500,
            maxFiles: 200,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
            addRemoveLinks: true,
            init: function () {
                var submitBtn = document.getElementById("submit_docs_prop_vehiculo");
                myDropzoneDocsProp = this;
                submitBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzoneDocsProp.processQueue();
                });
                this.on("addedfile", function (file) {
                    $('#enfoque_zona_subir_docs_prop_vehiculo').children().remove();
                    $('#enfoque_zona_subir_docs_prop_vehiculo').append(".....")
                    /*alert("file uploaded");*/
                });

                this.on("complete", function (file) {
                    myDropzoneDocsProp.removeFile(file);
                });

                this.on("success",
                    myDropzoneDocsProp.processQueue.bind(myDropzoneDocsProp)
                );
            }
        };
        $('#submit_docs_prop_vehiculo').on('click',function () {
            $('#boton_exito').click();
            $('#enfoque_zona_subir_docs_prop_vehiculo').children().remove();
            $('#enfoque_zona_subir_docs_prop_vehiculo').append(
                "<div class='alert alert-success d-flex align-items-center' role='alert'>" +
                "<div class='flex-00-auto'>" +
                "<i class='fa fa-fw fa-check'></i>" +
                "</div>" +
                "<div class='flex-fill ml-3'>" +
                "<p class='mb-0'>" + "Agregados" + " <a class='alert-link' href='javascript:void(0)'></a>!</p>" +
                "</div>"
            );
        })


        /*para subir imagenes de perfil de vehiculo*/
        Dropzone.options.myDropzoneImgsPerfil = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 500,
            maxFiles: 200,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
            addRemoveLinks: true,
            init: function () {
                var submitBtn = document.getElementById("submit_imgs_perfil_vehiculo");
                myDropzoneImgsPerfil = this;

                submitBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzoneImgsPerfil.processQueue();
                });
                this.on("addedfile", function (file) {
                    $('#enfoque_zona_subir_imgs_perfil_vehiculo').children().remove();
                    $('#enfoque_zona_subir_imgs_perfil_vehiculo').append("......");

                    /*alert("file uploaded");*/
                });

                this.on("complete", function (file) {
                    myDropzoneImgsPerfil.removeFile(file);
                });

                this.on("success",
                    myDropzoneImgsPerfil.processQueue.bind(myDropzoneImgsPerfil)
                );
            }
        };
        $('#submit_imgs_perfil_vehiculo').on('click',function () {
            $('#boton_exito').click();
            $('#enfoque_zona_subir_imgs_perfil_vehiculo').children().remove();
            $('#enfoque_zona_subir_imgs_perfil_vehiculo').append(
                "<div class='alert alert-success d-flex align-items-center' role='alert'>" +
                "<div class='flex-00-auto'>" +
                "<i class='fa fa-fw fa-check'></i>" +
                "</div>" +
                "<div class='flex-fill ml-3'>" +
                "<p class='mb-0'>" + "Agregados" + " <a class='alert-link' href='javascript:void(0)'></a>!</p>" +
                "</div>"
            );
        });



        /*JQUERY PARA ENVIAR FORM DE DOCUEMENTOS RENOVABLES*/
        $('#form_subir_docs_renov_vehicular').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#boton_exito').click();
                    $('#mensaje_respuesta_form_subir_docs_renov_vehicular').append(
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
        /*JQUERY PARA ENVIAR FORM DE SUBIR SEGUROS DE VEHICULO*/
        /*$('#form_subir_seguros').submit(function () {
            var campoa = $('#form_subir_seguros').find('input[name^="campoa"]').serialize();
            var campob = $('#form_subir_seguros').find('input[name^="campob"]').serialize();
            var campoc = $('#form_subir_seguros').find('input[name^="campoc"]').serialize();
            var campod = $('#form_subir_seguros').find('input[name^="campod"]').serialize();
            var campoe = $('#form_subir_seguros').find('input[name^="campoe"]').serialize();
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: {
                    campoa:campoa,
                    campob:campob,
                    campoc:campoc,
                    campod:campod,
                    campoe:campoe,
                },
                success : function (data) {
                    $('#mensaje_respuesta_form_subir_seguros').html(data);
                }
            });
            return false;
        });*/
        /*$('#form_subir_seguros').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serializeArray(),
                success : function (data) {
                    $('#mensaje_respuesta_form_subir_seguros').html(data);
                }
            });
            return false;
        });*/

        /*Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#myDropzone", {
            url: "",
            maxFileSize: 50,
            addRemoveLinks: true,
            //more dropzone options here
        });

        //Add existing files into dropzone
        var existingFiles = [
            { name: "2710rkfadelante.jpg", size: 12345678 },
            { name: "Filename 4.pdf", size: 12345678 },
            { name: "Filename 5.pdf", size: 12345678 }

        ];
        for (i = 0; i < existingFiles.length; i++) {
            myDropzone.emit("addedfile", existingFiles[i]);
            //myDropzone.emit("thumbnail", existingFiles[i], "/image/url");
            myDropzone.emit("complete", existingFiles[i]);
        }*/
    </script>


    {{-- ############################################### START Aparecer Seccion Subida Img & desaparecer Slider ######################################################--}}
    <script>
        /**/

        var interuptor_tbn_documentos_propiedad_vehiculo = 0;
        $(document).on('click', '#btn_insertar_documentos_propiedad_vehiculo', function () {
            if (interuptor_tbn_documentos_propiedad_vehiculo == 0) {
                $('#bloque_docs_prop_vehiculo').addClass('d-none') /*hacer que desaparezca el carrusel de imagenes*/
                $('#bloque_subida_docs_prop_vehiculo').removeClass('d-none'); /*hacer que aparezca la seccion de subir archivos*/
                /*$('html, body').animate({
                    scrollTop: $("#enfoque_zona_subir_docs_prop_vehiculo").offset().top
                }, 20);*/
                interuptor_tbn_documentos_propiedad_vehiculo = 1;
            } else {
                $('#bloque_subida_docs_prop_vehiculo').addClass('d-none');  /*hacer que ahora se cierre la seccion de subir archivos*/
                $('#bloque_docs_prop_vehiculo').removeClass('d-none') /*hacer que aparezca el carrusel de imagenes*/
                /*location.reload();*//*recargamos la imagen*/
                interuptor_tbn_documentos_propiedad_vehiculo = 0;
                /*$('html, body').animate({
                    scrollTop: $("#enfoque_zona_subir_docs_prop_vehiculo").offset().top
                }, 20);*/
            }
        });


        var interuptor_tbn_imagenes_perfil_vehiculo = 0;
        $(document).on('click', '#btn_insertar_imagenes_perfil_vehiculo', function () {
            if (interuptor_tbn_imagenes_perfil_vehiculo == 0) {
                $('#bloque_imgenes_perfil_vehiculo').addClass('d-none') /*hacer que desaparezca el carrusel de imagenes*/
                $('#bloque_subida_imagenes_perfil_vehiculo').removeClass('d-none'); /*hacer que aparezca la seccion de subir archivos*/
                /*$('html, body').animate({
                    scrollTop: $("#enfoque_zona_subir_imgs_perfil_vehiculo").offset().top
                }, 1);*/
                interuptor_tbn_imagenes_perfil_vehiculo = 1;
            } else {
                $('#bloque_subida_imagenes_perfil_vehiculo').addClass('d-none');  /*hacer que ahora se cierre la seccion de subir archivos*/
                $('#bloque_imgenes_perfil_vehiculo').removeClass('d-none') /*hacer que aparezca el carrusel de imagenes*/
                /*location.reload();*//*recargamos la imagen*/
                interuptor_tbn_imagenes_perfil_vehiculo = 0;
                /*$('html, body').animate({
                    scrollTop: $("#enfoque_zona_subir_imgs_perfil_vehiculo").offset().top
                }, 1);*/
            }
        });
    </script>

    {{--##############################################  js  #####################################################--}}
    <script>
        /*"<td class='d-none d-sm-table-cell font-size-sm'>" +
            "<div class='col-md-12' style='float: right;'>" +
                "<input type='file' class='custom-file-input' value='' id='archiv' name='campoe[]' required>" +
                "<label class='custom-file-label' id='archiv' id='nfile'></label>" +
            "</div>" +
        "</td>" +*/
        var contador = 0;
        $(document).on('click', '#btn_generar_filas', function () {
            contador = contador + 1;
            $('#body_tb_form_in').append(
                "<tr>" +
                "<td class='d-none'>" +
                "<input type='hidden' name='placa_id[]' value='' class='placa_id_subir_seguro' id='' required>" +
                "</td>" +
                "<td class='d-none d-sm-table-cell font-size-sm'>" +
                "<input type='text' value='{{date('Y')}}' class='form-control' name='campoa[]' placeholder='20XX...' required>" +
                "</td>" +
                "<td class='d-none d-sm-table-cell font-size-sm'>" +
                "<input type='text' value='' class='form-control' name='campob[]' required>" +
                " </td>" +
                "<td class='d-none d-sm-table-cell font-size-sm'>" +
                "<input type='text' value='' class='form-control' name='campoc[]' required>" +
                "</td>" +
                " <td class='d-none d-sm-table-cell font-size-sm'>" +
                "<input type='text' value='' class='js-flatpickr form-control material_green datepickerr" + contador + "' name='campod[]' placeholder='Año-mes-dia' required>" +
                "</td>" +
                "<td class='d-none d-sm-table-cell font-size-sm'>" +
                "<div class='col-md-12' style='float: right;'>" +
                "<input type='file' class='' value='' name='campoe[]' required>" +
                "</div>" +
                "</td>" +
                " <td class='btn-eliminar justify-content-center'>" +
                "<div class=''>" +
                "<i class='fas fa-trash'></i>" +
                "</div>" +
                "</td>" +
                " </tr>"
            );
            $(".datepickerr" + contador).flatpickr();
            $(".datepickerr" + contador).flatpickr("option", "dateFormat", "yy-mm-dd");

            placavehiculo = $('#placa_id').val();
            $('.placa_id_subir_seguro').val(placavehiculo);
        });
        $(document).on('click', '.btn-eliminar', function () {
            $(this).parent().remove();
        })

        /*document.getElementById('archiv').onchange = function () {
            console.log(this.value);
            document.getElementById('nfile').innerHTML = document.getElementById('archiv').files[0].name;
        }*/
        /*$(document).on('change', '.archiv',function () {
            var d = $(this).val();
            $('.nfile').text(d);
        });*/
        /*document.getElementsByClassName('archiv').onchange = function () {
            console.log(this.value);
            document.getElementsByClassName('nfile').innerHTML = document.getElementById('archiv').files[0].name;
        }*/
    </script>
    {{--<script src="{{asset('jsromsys/vehiculos.create.js')}}"></script>--}}

@endsection

