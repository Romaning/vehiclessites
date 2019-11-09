{{--@foreach($datosvehiculo as $filavehiculo)
@endforeach--}}
@extends('layouts.layoutmaster')
@section('title')

@endsection
@section('styles')
    {{--#################### START CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_css')
    {{--#################### END CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{--##################### START CAROUSEL CSS #####################--}}
    @include('components.links_css_js.carousel.carousel_css')
    {{--##################### END CAROUSEL CSS #####################--}}

@endsection
@section('hero_cuadro_bienvenida')

@endsection
@section('content')
    @include('components.alerts.alerttre')
    {{--{{csrf_field()}}--}}
    <input type="text" id="mensaje">
    <div id="mensajejson"></div>

    <div class="block shadow p-2 mb-1 rounded" id="bloque_subida_docs_renov_vehiculo" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">VEHICULO</h3>
        </div>
        <div class="block-content block-content-full">
            <h2 class="content-heading border-bottom mb-4 pb-2">Subida de Archivos Asincrona</h2>
            <div class="row">
                <div class="{{--col-lg-8--}} col-lg-12 {{--col-xl-5--}}">
                    <!-- DropzoneJS Container -->
                    <div id="dropezone_docs_renov_vehiculo">
                        <form method="post" action="{{route('docsrenov.autocomplet')}}" enctype="multipart/form-data" class="dropzone" id="dropZoneDocsRenovVehiParaEditar">
                            @csrf
                            <input type="hidden" name="placa_id" value="2720RKF">
                            <div class="dz-message">
                                Sube Tus imagenes aquí
                            </div>
                            <div class="dropzone-previews"></div>
                        </form>
                        <button type="submit" class="btn btn-success" id="btnEnviarSms">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="enfoque_zona_eliminar_subir_docs_renov_vehiculo"></div>
        {{--<button type="submit" id="limpiar_seccion_dubida_fotos">LIMPIAR</button>--}}
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
    <!-- Script -->
    <script>
        /*$('#btnEnviarSms').click(function () {*/
        /*$(document).on('click','#btnEnviarSms',function () {*/
        Dropzone.autoDiscover = false;
        $("#dropZoneDocsRenovVehiParaEditar").dropzone({
            addRemoveLinks: true,
            init: function() {
                myDropzone = this;
                $.ajax({
                    url: '{{route('docsrenov.autocomplet')}}',
                    type: 'POST',
                    data: {'requerimiento': 2, 'placa_id': '2720RKF'},
                    success: function(response){
                        $.each(response, function(key,value){
                            $('#mensaje').val(value.nombre);
                            var mockFile = { name: value.nombre, size: value.tamano};
                            myDropzone.emit("addedfile", mockFile);
                            myDropzone.emit("thumbnail", mockFile, '/GameaAutoParkSys/public/'+value.carpetamasarchivo );
                            myDropzone.emit("complete", mockFile);
                            $('#mensaje').val(value.path);
                        });
                    }
                });

            }
        });
    </script>
@endsection
