@foreach($datosvehiculo as $filavehiculo)
@endforeach
@extends('layouts.layoutmaster')
@section('title')
    EDITAR VEHICULO
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
        @slot('titulo1','Editar Vehiculo')
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
            <h3 class="block-title">Formulario</h3>
        </div>
        <div class="block-content block-content-full">
            {{--<form action="{{route('vehiculo.store')}}" method="POST"
                  enctype="multipart/form-data" --}}{{--onsubmit="return false;"--}}{{-- id="form_subir_datos_vehiculo">
                @csrf--}}
            <div class="row push">
                <div class="col-md-8  shadow p-2 mb-1 rounded">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="placa_id">Placa Vehicular</label>
                                <input type="text" class="form-control btn-success js-maxlength" id="placa_id"
                                       maxlength="100" data-always-show="true"
                                           data-placement="top"
                                       name="placa_id" value="{{$filavehiculo->placa_id}}">
                            </div>
                            <div class="col">
                                <label for="numero_crpva">RCPVA</label>
                                <input type="text" class="form-control js-maxlength" id="numero_crpva"
                                       maxlength="100" data-always-show="true"
                                           data-placement="top"
                                       name="numero_crpva" value="{{$filavehiculo->numero_crpva}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="numero_chasis">Numero Chasis</label>
                                <input type="text" class="form-control js-maxlength" id="numero_chasis"
                                       maxlength="100" data-always-show="true"
                                           data-placement="top"
                                       name="numero_chasis" value="{{$filavehiculo->numero_chasis}}">
                            </div>
                            <div class="col">
                                <label for=numero_motor">Numero Motor</label>
                                <input type="text" class="form-control js-maxlength" id="numero_motor"
                                       maxlength="100" data-always-show="true"
                                           data-placement="top"
                                       name="numero_motor" value="{{$filavehiculo->numero_motor}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for=documento_importacion">Documento de Importacion</label>
                                <input type="text" class="form-control js-maxlength"
                                       maxlength="100" data-always-show="true"
                                           data-placement="top"
                                       id="documento_importacion" name="documento_importacion"
                                       value="{{$filavehiculo->documento_importacion}}">
                            </div>
                            <div class="col">
                                <label for=numero_documento_importacion">Numero Documento de Importacion</label>
                                <input type="text" class="form-control js-maxlength"
                                       maxlength="20" data-always-show="true"
                                           data-placement="top"
                                       id="numero_documento_importacion" name="numero_documento_importacion"
                                       value="{{$filavehiculo->numero_documento_importacion}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="clase_id">Clase <span class="text-danger">*</span></label>
                                <input type="text" class=" form-control" id="clase_id"
                                       name="clase_id" style="width: 100%;"
                                       value="{{$filavehiculo->clase_descripcion}}">
                            </div>
                            <div class="col">
                                <label for=marca_id">Marca <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="marca_id"
                                       name="marca_id" style="width: 100%;"
                                       value="{{$filavehiculo->marca_descripcion}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="tipo_id">Tipo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tipo_id"
                                       name="tipo_id" style="width: 100%;" value="{{$filavehiculo->tipo_descripcion}}">
                            </div>
                            <div class="col">
                                <label for=tipo_combustible_id">Tipo Combustible <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" id="tipo_combustible_id"
                                       name="tipo_combustible_id" style="width: 100%;"
                                       value="{{$filavehiculo->tipo_combustible_descripcion}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for=color">Color</label>
                                <input type="text" class="form-control" id="color" name="color"
                                       value="{{$filavehiculo->color}}">
                            </div>
                            <div class="col">
                                <label for=plazas">Plazas</label>
                                <input type="text" class="form-control" id="plazas"
                                       name="plazas" value="{{$filavehiculo->plazas}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for=ruedas">Ruedas</label>
                                <input type="text" class="form-control" id="ruedas"
                                       name="ruedas" value="{{$filavehiculo->ruedas}}">
                            </div>
                            <div class="col">
                                <label for=traccion">Traccion</label>
                                <input type="text" class="form-control" id="traccion"
                                       name="traccion" value="{{$filavehiculo->traccion}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{--<h3 class="content-heading border-bottom mb-4 pb-2">DATOS ADICIONALES DEL VEHICULO</h3>--}}
                    </div>

                    <div class="form-group">
                        <div class="row">
                            {{--<div class="col">
                                <label for="estado_servicio">Estado Servicio<span class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow p-2 mb-1 rounded " id="estado_servicio"
                                       name="estado_servicio" style="width: 100%;"
                                       value="{{$filavehiculo->estado_servicio}}">
                            </div>--}}
                            <div class="col">
                                <label for=tipo_uso_id">Tipo de Uso<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tipo_uso_id"
                                       name="tipo_uso_id" style="width: 100%;"
                                       value="{{$filavehiculo->tipo_uso_descripcion}}">
                            </div>
                            <div class="col">
                                <label for=fecha_incorporacion_institucion">Fecha Incorporacion a la Institucion<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fecha_incorporacion_institucion"
                                       name="fecha_incorporacion_institucion" style="width: 100%;"
                                       value="{{$filavehiculo->fecha_incorporacion_institucion}}">
                            </div>
                        </div>
                    </div>
                    {{--<h3 class="content-heading border-bottom mb-4 pb-2">ESTADO SERVICIO DE VEHICULO</h3>--}}
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
                {{--#################################################################--}}
                <div class="col-md-4">
                    <!-- Tiles Slider 3 -->
                    <div class="js-slider slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-inbox fa-5x text-success"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">New messages</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-file-alt fa-5x text-warning"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">Files</div>
                            </div>
                        </div>
                        <div class="block text-center bg-white mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-server fa-5x text-danger"></i>
                                <div class="font-size-h3 font-w600 mt-3">26</div>
                                <div class="text-muted">Websites</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Tiles Slider 3 -->

                    <!-- Tiles Slider 3 -->
                    <div class="js-slider slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-inbox fa-5x text-success"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">New messages</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-file-alt fa-5x text-warning"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">Files</div>
                            </div>
                        </div>
                        <div class="block text-center bg-white mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-server fa-5x text-danger"></i>
                                <div class="font-size-h3 font-w600 mt-3">26</div>
                                <div class="text-muted">Websites</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Tiles Slider 3 -->

                    <!-- Tiles Slider 3 -->
                    <div class="js-slider slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-inbox fa-5x text-success"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">New messages</div>
                            </div>
                        </div>
                        <div class="block text-center mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-file-alt fa-5x text-warning"></i>
                                <div class="font-size-h3 font-w600 mt-3">12</div>
                                <div class="text-muted">Files</div>
                            </div>
                        </div>
                        <div class="block text-center bg-white mb-0">
                            <div class="block-content py-5">
                                <i class="fa fa-server fa-5x text-danger"></i>
                                <div class="font-size-h3 font-w600 mt-3">26</div>
                                <div class="text-muted">Websites</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Tiles Slider 3 -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Basic -->

    {{--SECCION DE SUBIDA DE IMAGENES DE DOCUMENTOS DE PROPIEDAD DEL VEHICULO (TODOS LOS PERFILES O ANGULOS)--}}
    <!-- Dropzone (functionality is auto initialized by the plugin itself in js/plugins/dropzone/dropzone.min.js) -->
    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
    <div class="block d-none  shadow p-2 mb-1 rounded" id="bloque_subida_docs_prop_vehiculo" data-toggle="appear"
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
                        <form method="post" action="{{route('docsprop.storefile')}}" enctype="multipart/form-data"
                              class="dropzone" id="myDropzoneDocsProp">
                            @csrf
                            <input type="text" name="placa_id" value="" id="placa_id_subida_docs_prop_vehiculo">
                            <div class="dz-message">
                                Sube Tus imagenes aquí
                            </div>
                            <div class="dropzone-previews"></div>
                        </form>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                        id="submit_docs_prop_vehiculo" style="float:right;">
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
            @foreach($datosdocumentospropiedadvehicular as $filadocpropvehi)
                <div>
                    <img class="img-fluid" src="{{asset('imagenes_store/documentos/'.$filadocpropvehi->archivo_subido.'')}}">
                </div>
            @endforeach
            {{--<img class="img-fluid" src="{{asset('assets/media/photos/photo19@2x.jpg')}}" alt="">--}}
        </div>
    </div>
    <!-- END Slider with multiple images and center mode -->


    {{--SECCION DE SUBIDA DE IMAGENES DEL VEHICULO (TODOS LOS PERFILES O ANGULOS)--}}
    <!-- Dropzone (functionality is auto initialized by the plugin itself in js/plugins/dropzone/dropzone.min.js) -->
    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
    <div class="block d-none shadow p-2 mb-1 rounded" id="bloque_subida_imagenes_perfil_vehiculo"
         data-toggle="appear"
         data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">SUBIR IMAGENES (DELANTERA, DERECHA, IZQUIERDA, ATRAS, Y OTROS) DEL VEHICULO</h3>
        </div>
        <div class="block-content block-content-full">
            <h2 class="content-heading border-bottom mb-4 pb-2">Subida de Archivos Asincrona</h2>
            <div class="row">
                <div class="{{--col-lg-8--}} col-lg-12 {{--col-xl-5--}}">
                    <!-- DropzoneJS Container -->
                    {{--<h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3>--}}
                    <div id="dropezone">
                        <form method="post" action="{{route('imgsperfil.storefile')}}" enctype="multipart/form-data"
                              class="dropzone" id="myDropzoneImgsPerfil">
                            @csrf
                            <input type="text" name="placa_id" value="" id="placa_id_subida_imgs_perfil_vehiculo">
                            <div class="dz-message">
                                Sube Tus imagenes aquí
                            </div>
                            <div class="dropzone-previews"></div>
                        </form>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                        id="submit_imgs_perfil_vehiculo" style="float: right;">
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


    <!-- Slider with multiple images and center mode -->
    <div class="block shadow p-2 mb-1 rounded" id="bloque_imgenes_perfil_vehiculo" data-toggle="appear"
         data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">
                <i class="fa fa-play fa-fw text-primary"></i>
                Imagenes de perfil Vehiculo
                <button type="submit" class="btn btn-primary shadow p-2 mb-1 rounded"
                        id="btn_insertar_imagenes_perfil_vehiculo" style="float: right;">
                    INSERTAR
                </button>
            </h3>
        </div>
        <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-arrows="true"
             data-slides-to-show="3" data-center-mode="true" data-autoplay="true" data-autoplay-speed="3000">
            {{--<img class="img-fluid" src="{{asset('assets/media/photos/photo19@2x.jpg')}}" alt="">--}}
            @foreach($datosimagenperfilvehicular as $fileimgperfil)
                <div>
                    <img class="img-fluid" src="{{asset('imagenes_store/vehiculos/'.$fileimgperfil->archivo_subido.'' )}}">
                </div>
            @endforeach
        </div>
    </div>
    <!-- END Slider with multiple images and center mode -->


    <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.flatpickr()) -->
    <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">SUBIR DOCUMENTOS RENOVABLES DEL VEHICULO</h3>
        </div>
        <div class="block-content">
            @foreach($datosdocumentosrenovable as $filadocrenov)
                {{-- <form action="{{route('documentosrenovablevehiculo.store')}}" method="POST"
                       id="form_subir_docs_renov_vehicular">
                     @csrf--}}
                <input type="hidden" name="placa_id" value="" id="placa_id_subida_docs_renov_vehicular">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="gestion_var_front">Gestion</label>
                            <input type="text" value="{{ $filadocrenov->gestion}}" name="gestion"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-flatpickr-custom">FECHA FIN COBERTURA DE SOAT</label>
                            <input type="text" class="js-flatpickr form-control bg-white"
                                   id="fecha_fin_cobertura_soat"
                                   name="fecha_fin_cobertura_soat" placeholder="Año-mes-dia"
                                   data-date-format="Y-m-d" value="{{$filadocrenov->fecha_fin_cobertura_soat}}">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>B-SISA</label>
                            <div class="custom-control custom-switch custom-control-lg mb-2">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom-lg1"
                                       name="bsisa" value="1" @if($filadocrenov->bsisa == "1") checked @endif>
                                <label class="custom-control-label"
                                       for="example-sw-custom-lg1">{{$filadocrenov->bsisa == "1"? "SI":"NO"}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>inspeccion Vehicular</label>
                            <div class="custom-control custom-switch custom-control-lg mb-2">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom-lg2"
                                       name="inspeccion_vehicular"
                                       value="1" @if($filadocrenov->inspeccion_vehicular == "1") checked @endif>
                                <label class="custom-control-label" for="example-sw-custom-lg2">SI</label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--<div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                style="float: right">
                            GUARDAR
                        </button>
                    </div>
                </div>
            </div>--}}
            {{--</form>--}}
        </div>
        <div id="mensaje_respuesta_form_subir_docs_renov_vehicular"></div>
    </div>
    <!-- END Flatpickr Datetimepicker -->

    <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.flatpickr()) -->
    <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">
                SEGUROS
                {{--<button id="btn_generar_filas" class="btn btn-primary shadow p-2 mb-1 rounded" style="float: right">
                    GENERAR CAMPOS
                </button>--}}
            </h3>
        </div>
        <div class="block-content">
            <form action="{{route('seguro.store')}}" method="POST" id="form_subir_seguros">
                @csrf
                <input type="text" name="placa_id" class="d-none" value="" id="placa_id_subir_seguro">
                <div class="row cabecera_tabla_div">
                    <div class="col-lg-1">
                        GESTION
                    </div>
                    <div class="col">
                        DESCRIPCION
                    </div>
                    <div class="col">
                        EMPRESA ASEGURADORA
                    </div>
                    <div class="col">
                        FECHA DE VIGENCIA
                    </div>
                    <div class="col">
                        ARCHIVOS SUBIDOS
                    </div>
                    <div class="col d-none">
                        PLACA ID
                    </div>
                </div>
                <div id="body_tb_insertar_campos">
                    @foreach($datosseguro as $filadatosseguro)
                        <div class="row">
                            <div class="col-lg-1"><input type="text" value="{{$filadatosseguro->gestion}}"
                                                         class="form-control"
                                                         name="campoa[]"></div>
                            <div class="col"><input type="text" value="{{$filadatosseguro->texto}}"
                                                    class="form-control" name="campob[]"></div>
                            <div class="col"><input type="text" value="{{$filadatosseguro->empresa_aseguradora}}"
                                                    class="form-control" name="campoc[]"></div>
                            <div class="col"><input type='text' value="{{$filadatosseguro->fecha_vigencia}}"
                                                    class='js-flatpickr form-control material_green datepickerr'
                                                    name='campod[]' placeholder='Año-mes-dia'></div>
                            <div class="col"><input type="text" value="{{$filadatosseguro->archivo_subido}}"
                                                    class="form-control" name="campoe[]"></div>
                            <div class="btn-eliminar">
                                <i class='fas fa-trash'></i>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-1">.</div>
                {{--<div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button type="submit" id="btn_enviar_datos "
                                    class="btn btn-success shadow p-2 mb-1 rounded" style="float: right">
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </div>--}}
            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_seguros"></div>
    </div>
    <!-- END Flatpickr Datetimepicker -->
@endsection

@section('js_script_import')

    {{--############################ START SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_js')
    {{--############################ END SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--###################### START SCRIPT JS CARROUSEL ####################--}}
    @include('components.links_css_js.carousel.carousel_js')
    {{--###################### END SCRIPT JS CARROUSEL ####################--}}

    {{--############################################## JS #############################################--}}
    {{--
        <script src="{{asset('jsromsys/vehiculos.show.js')}}"></script>
    --}}
    {{-- ############################################### END SCRIPTS PARA DROPZONE ######################################################--}}
    <script>
        placavehiculo = $('#placa_id').val();

        /*para subir documentos de vehiculo*/
        Dropzone.options.myDropzoneDocsProp = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 50,
            maxFiles: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.gif.pdf",
            addRemoveLinks: true,
            renameFile: true,
            init: function () {
                var submitBtn = document.getElementById("submit_docs_prop_vehiculo");
                myDropzoneDocsProp = this;
                submitBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzoneDocsProp.processQueue();
                });
                this.on("addedfile", function (file) {
                    alert("file uploaded");
                });

                this.on("complete", function (file) {
                    myDropzoneDocsProp.removeFile(file);
                });

                this.on("success",
                    myDropzoneDocsProp.processQueue.bind(myDropzoneDocsProp)
                )
                ;
            }
        };

        /*para subir imagenes de perfil de vehiculo*/
        Dropzone.options.myDropzoneImgsPerfil = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 50,
            maxFiles: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.gif.pdf",
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
                    alert("file uploaded");
                });

                this.on("complete", function (file) {
                    myDropzoneImgsPerfil.removeFile(file);
                });

                this.on("success",
                    myDropzoneImgsPerfil.processQueue.bind(myDropzoneImgsPerfil)
                )
                ;
            }
        };

        /*JQUERY PARA ENVIAR FORM DE DOCUEMENTOS RENOVABLES*/
        $('#form_subir_docs_renov_vehicular').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#mensaje_respuesta_form_subir_docs_renov_vehicular').html(data);
                }
            });
            return false;
        });

    </script>

    {{-- ############################################### START Aparecer Seccion Subida Img & desaparecer Slider ######################################################--}}
    <script>
        /**/
        var interuptor_tbn_documentos_propiedad_vehiculo = 0;
        $(document).on('click', '#btn_insertar_documentos_propiedad_vehiculo', function () {
            if (interuptor_tbn_documentos_propiedad_vehiculo == 0) {
                $('#bloque_subida_docs_prop_vehiculo').removeClass('d-none'); /*hacer que aparezca la seccion de subir archivos*/
                $('#bloque_docs_prop_vehiculo').addClass('d-none') /*hacer que desaparezca el carrusel de imagenes*/
                $('html, body').animate({
                    scrollTop: $("#enfoque_zona_subir_docs_prop_vehiculo").offset().top
                }, 20);
                interuptor_tbn_documentos_propiedad_vehiculo = 1;
            } else {
                bloque_subida_docs_prop_vehiculo
                $('#bloque_subida_docs_prop_vehiculo').addClass('d-none');  /*hacer que ahora se cierre la seccion de subir archivos*/
                $('#bloque_docs_prop_vehiculo').removeClass('d-none');/*hacer que aparezca el carrusel de imagenes*/
                /*location.reload();*//*recargamos la imagen*/
                interuptor_tbn_documentos_propiedad_vehiculo = 0;
            }
        });

        var interuptor_tbn_imagenes_perfil_vehiculo = 0;
        $(document).on('click', '#btn_insertar_imagenes_perfil_vehiculo', function () {
            if (interuptor_tbn_imagenes_perfil_vehiculo == 0) {
                $('#bloque_subida_imagenes_perfil_vehiculo').removeClass('d-none'); /*hacer que aparezca la seccion de subir archivos*/
                $('#bloque_imgenes_perfil_vehiculo').addClass('d-none') /*hacer que desaparezca el carrusel de imagenes*/
                $('html, body').animate({
                    scrollTop: $("#enfoque_zona_subir_imgs_perfil_vehiculo").offset().top
                }, 20);
                interuptor_tbn_imagenes_perfil_vehiculo = 1;
            } else {
                $('#bloque_subida_imagenes_perfil_vehiculo').addClass('d-none');  /*hacer que ahora se cierre la seccion de subir archivos*/
                $('#bloque_imgenes_perfil_vehiculo').removeClass('d-none'); /*hacer que aparezca el carrusel de imagenes*/
                /*location.reload();*//*recargamos la imagen*/
                interuptor_tbn_imagenes_perfil_vehiculo = 0;
            }
        });
    </script>

@endsection
