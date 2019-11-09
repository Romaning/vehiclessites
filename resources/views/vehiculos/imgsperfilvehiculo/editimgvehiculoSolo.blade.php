@extends('layouts.layoutmaster')
@section('title')
    EDITAR IMAGEN
@endsection
@section('styles')
    {{--#################### START CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_css')
    {{--#################### END CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

@endsection

{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Editar Imagen')
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
    @include('components.alerts.alerttre')

    {{csrf_field()}}

    <!-- Dropzone (functionality is auto initialized by the plugin itself in js/plugins/dropzone/dropzone.min.js) -->
    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Subir Archivos</h3>
        </div>
        <div class="block-content block-content-full">
            <h2 class="content-heading border-bottom mb-4 pb-2">Subida de Archivos Asincrona</h2>
            <div class="row">
                {{--<div class="col-lg-4">
                    <p class="font-size-sm text-muted">
                        Drag and drop sections for your file uploads
                    </p>
                </div>--}}
                <div class="{{--col-lg-8--}} col-lg-12 {{--col-xl-5--}}">
                    <!-- DropzoneJS Container -->
                    {{--<h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3>--}}
                    <form method="post" action="{{route('imgsperfil.storefile')}}" enctype="multipart/form-data"
                          class="dropzone" id="dropzone">
                        @csrf
                        <input type="text" class="form-control shadow p-2 mb-1 rounded " id="placa_id"
                               name="placa_id" value="{{$vehiculo}}">
                        <div class="dz-message">
                            Sube Tus imagenes aquí
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Dropzone -->
@endsection
@section('js_script_import')

    {{--############################ START SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_js')
    {{--############################ END SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{-- ################ END SCRIPTS PARA DROPZONE ###############--}}
    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
        console.log(APP_URL);
        var placavehiculo = $('#placa_id').val();
        Dropzone.options.dropzone = {
            init: function () {
                myDropzone = this;
                $.ajax({
                    url: '{{route('imgsperfil.autocomplet')}}',
                    type: 'POST',
                    data: {'requerimiento': 2, 'placa_id': placavehiculo},
                    success: function (response) {
                        placavehiculo = $('#placa_id').val();
                        $.each(response, function (key, value) {
                            var mockFile = {name: value.nombre, size: 2040};
                            myDropzone.emit("addedfile", mockFile);
                            /*myDropzone.emit("thumbnail", mockFile, 'proyecto3/GameaAutoParkSys/public/' + value.carpetamasarchivo);*//*antes*/
                            myDropzone.emit("thumbnail", mockFile, ''+APP_URL+'/' + value.carpetamasarchivo);/*ahora*/
                            myDropzone.emit("complete", mockFile);
                        });
                    }
                });
            },

            maxFilesize: 20,
            renameFile: function (file) {
                return /*placavehiculo+''+*/ file.name /*.replace(/\s/g,"_")*/;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function (file) {
                /*file.name = file.name.replace(/\s/g,"_");*/
                var name = file.name.replace(/\s/g, "_");/*LE CONCAT CON LA PLACA PORQUE EN EL CONTROLADOR LE ESAMOS DANDO IGUAL*/   /*placavehiculo+file.upload.filename*/
                /*CON EL FILE.UPLOAD.FILENAME DICE QUE OBTENGAS EL NOMBRE CON EL QUE SE HA SUBIDO ESE ARCHIVO, OSEA EN EL renameFILE*/
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{route("imgsperfil.deletefile")}}',
                    data: {filename: name, placa_id: placavehiculo},
                    success: function (data) {
                        /*SE RECIBE LA RESPUESTA DEL CONTROLADOR AL ELIMINAR UNA IMAGEN ########*/
                        console.log("File has been successfully removed!!" + data);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function (file, response) {
                console.log(response);
                /*AQUI VIENE LA RESPUESTA DESDE CUALQUIER CONTROLADOR AL QUE SE HAY ENVIADO ##########*/
            },
            error: function (file, response) {
                return false;
            }
        };
    </script>
@endsection
