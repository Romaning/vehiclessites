@extends('layouts.layoutmaster')
@section('title')
    HISTORIAL DE DOCUMENTOS RENOVABLES POR PLACA
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
        @slot('titulo1','Historial Documentos')
        {{--<li class="breadcrumb-item">SECCION 2</li>
        <li class="breadcrumb-item">DOCUMENTOS POR PERIODO</li>
        <li class="breadcrumb-item">Anualmente</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Historial</a>
        </li>--}}
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('hero_cuadro_bienvenida')

@endsection

@section('content')
    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="row">
            <div class="col-lg-6">
                <input type="text" name="placa_id" value="{{$vehiculo}}" class="btn btn-success shadow rounded">
            </div>
            <div class="col-lg-6">
                <a href="{{route('docsrenov.registrarsolo',$vehiculo)}}" class="btn-sm btn-primary shadow rounded" style="float:right;">
                    <i class="fas fa-plus-circle"></i> Añadir
                </a>
            </div>
        </div>
    </div>

    {{--{{ $contador = 0 }}--}}
    @foreach($datosdocsrenov as $filadocrenov)

        <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.flatpickr()) -->
        <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
        <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
            <div class="block-content">

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="placa_id_subida_docs_renov_vehicular" class="d-none">PLACA</label>
                            <input type="hidden" name="placa_id" value="{{ $filadocrenov->placa_id}}"
                                   id="placa_id_subida_docs_renov_vehicular"
                                   class="form-control btn btn-success" style="height: 100%;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="gestion_var_front">GESTION</label>
                            <input type="text" value="{{ $filadocrenov->gestion}}" name="gestion"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
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

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>INSPECCION VEHICULAR</label>
                            <div class="custom-control custom-switch custom-control-lg mb-2">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom-lg2"
                                       name="inspeccion_vehicular"
                                       value="1" @if($filadocrenov->inspeccion_vehicular == "1") checked @endif>
                                <label class="custom-control-label" for="example-sw-custom-lg2">SI</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-control-lg mb-2">
                                <a href="{{route('docsrenov.edit',$filadocrenov->archivero_id)}}"
                                   class="btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                   title="EDITAR">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="mensaje_respuesta_form_subir_docs_renov_vehicular"></div>
        </div>
        <!-- END Flatpickr Datetimepicker -->
    @endforeach

@endsection

@section('footer')

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
        placavehiculo = $('#placa_id').val();


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

@endsection
