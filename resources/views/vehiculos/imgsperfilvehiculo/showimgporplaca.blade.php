@extends('layouts.layoutmaster')
@section('title')
    INFORMACION IMAGEN
@endsection

@section('styles')
    {{--#################### START CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_css')
    {{--#################### END CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--##################### START CAROUSEL CSS #####################--}}
    @include('components.links_css_js.carousel.carousel_css')
    {{--##################### END CAROUSEL CSS #####################--}}

    <!-- Stylesheets  para previsualizar in out -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/magnific-popup/magnific-popup.css')}}">

    <!-- Page CS DIRECTO PARA SHOW VEHICULO -->
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Imagenes')
        {{--<li class="breadcrumb-item">SECCION 2</li>
        <li class="breadcrumb-item">IMAGENES DE PERFIL</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">De Todos Los Vehiculos</a>
        </li>--}}
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('hero_cuadro_bienvenida')

@endsection

@section('content')

    @foreach($datosplaca as $fila)
        {{--SLIDER DE IMAGENES DE DOCUEMENTOS DE PROPIEDAD SEGUN PLACA ID--}}
        <div class="block shadow p-2 mb-1 rounded" data-toggle="appear"
             data-class="animated bounceIn">
            <div class="block-header">
                <h3 class="block-title">
                    <i class="fa fa-play fa-fw text-primary"></i>
                    IMAGENES PERFIL VEHICULAR <div class="btn btn-success">{{$fila['placa']}}</div>
                    <a href="{{route('imgsperfil.editsolo', $fila['placa'])}}" class="btn btn-warning" style="float: right;">EDITAR</a>
                </h3>
            </div>
            <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-arrows="true"
                 data-slides-to-show="3" data-center-mode="true" data-autoplay="true" data-autoplay-speed="3000">
                @foreach($fila['images'] as $dato)
                    @foreach($dato as $atomo)
                        <div class="{{--row items-push--}} js-gallery img-fluid-100">
                            {{--<div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">--}}
                            <a class="img-link img-link-zoom-in img-thumb img-lightbox" href="{{asset('imagenes_store/vehiculos/'.$atomo->archivo_subido.'')}}">
                                <img class="img-fluid" src="{{asset('imagenes_store/vehiculos/'.$atomo->archivo_subido.'')}}">
                            </a>
                            {{--</div>--}}
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach

@endsection

@section('js_script_import')
    {{--############################ START SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_js')
    {{--############################ END SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--###################### START SCRIPT JS CARROUSEL ####################--}}
    @include('components.links_css_js.carousel.carousel_js')
    {{--###################### END SCRIPT JS CARROUSEL ####################--}}

    {{--##############################################  FOTOS PREVISUALIZAR EDIT VIEW #######################################--}}
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Page JS Helpers (Magnific Popup Plugin) -->
    <script>jQuery(function(){ One.helpers('magnific-popup'); });</script>
@endsection
