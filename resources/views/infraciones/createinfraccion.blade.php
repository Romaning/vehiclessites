@extends('layouts.layoutmaster')
@section('title')
    REGISTRAR INFRACCION
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
        @slot('titulo1','Registrar Infracciones')
        <li class="breadcrumb-item">SECCION 3</li>
        <li class="breadcrumb-item">INFRACCIONES</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Form Registrar Infraccion</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}

@section('hero_cuadro_bienvenida')
@endsection
@section('content')
    @include('components.alerts.alerttre')

    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">FORMULARIO</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('infraccion.store')}}" method="POST" enctype="multipart/form-data"
                  id="form_subir_infraccion">
                @csrf
                @method('POST')
                {{-- ############### FORMULARIO EN EL CENTRO ############--}}
                <div class="row push">
                    <div class="col-lg-2">
                    {{--<div class="row">
                        <div class="col" data-toggle="appear" data-class="animated zoomIn">--}}
                    <!-- Team Member -->
                    {{--<div class="block">
                        <div class="block-content">
                            <img src="{{asset('assets/media/avatars/avatar13.jpg')}}" width="100%"
                                 height="100%" id="src_imagen_perfil"
                                 class="justify-content-center">
                        </div>
                    </div>--}}
                    {{--<div class="form-group">
                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                   id="input_imagen_perfil"
                                   name="imagen_perfil">
                            <label class="custom-file-label" for="input_imagen_perfil">Carge Imagen...</label>
                        </div>
                    </div>--}}
                    <!-- END Team Member -->
                        {{--</div>
                    </div>--}}
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-froup">
                                    <label for="placa_id">PLACA: <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control"
                                            id="placa_id"
                                            name="placa_id"
                                            style="width: 100%;"
                                            data-placeholder="Escoger..." required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($vehiculos as $filavehiculo)
                                            <option
                                                value="{{$filavehiculo->placa_id}}" > {{$filavehiculo->placa_id}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gestion">GESTION : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="gestion" id="gestion" pattern="[0-9]+" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_infraccion">FECHA INFRACCION : <span class="text-danger">*</span></label>
                                    <input type="text" class="js-flatpickr form-control bg-white"
                                           id="fecha_infraccion"
                                           name="fecha_infraccion" placeholder="Año-mes-dia"
                                           data-date-format="Y-m-d" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="serie">SERIE : </label>
                                    <input type="text" class="form-control" name="serie" id="serie" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="boleta">BOLETA : </label>
                                    <input type="text" class="form-control" name="boleta" id="boleta" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="condigo">CODIGO : </label>
                                    <input type="text" class="form-control" name="condigo" id="condigo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">DESCRIPCION : </label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monto">MONTO (Bs) : </label>
                                    <input class="form-control" name="monto" id="monto" type="number" step="any">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success shadow">GUARDAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('js_script_import')

    {{--############################ START SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_js')
    {{--############################ END SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--###################### START SCRIPT JS CARROUSEL ####################--}}
    @include('components.links_css_js.carousel.carousel_js')
    {{--###################### END SCRIPT JS CARROUSEL ####################--}}
@endsection
