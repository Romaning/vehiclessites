@foreach($datosAsignaciones as $filaasignacion)
@endforeach
@extends('layouts.layoutmaster')
@section('title')
    EDITAR ASIGNACION
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
        @slot('titulo1','Editar Asignacion')
        {{--<li class="breadcrumb-item">SECCION 3</li>
        <li class="breadcrumb-item">ASIGNACIONES</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Asignaciones</a>
        </li>--}}
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}

@section('hero_cuadro_bienvenida')


@endsection
@section('content')
    @if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{csrf_field()}}
    <!-- Basic -->

    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="block-header">
            <h3 class="block-title">FORMULARIO</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('asignacion.update',$filaasignacion->asignacion_id)}}" method="POST" enctype="multipart/form-data"
                  id="form_subir_funcionario">
                @csrf
                @method('PUT')
                {{-- ############### FORMULARIO EN EL CENTRO ############--}}
                <div class="row push">
                    <div class="col-lg-2">
                        <p class="font-size-sm text-muted">
                            .
                        </p>
                    </div>
                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="placa_id">PLACA: <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control" id="placa_id" name="placa_id"
                                            style="width: 100%;" data-placeholder="Escoger...">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($vehiculosPlacas_NoEstanEnAsignaciones as $filavehiculo)
                                            <option
                                                value="{{$filavehiculo->placa_id}}" {{$filavehiculo->placa_id==$filaasignacion->placa_id ? "selected":""}} >
                                                {{$filavehiculo->placa_id}}
                                            </option>
                                        @endforeach
                                        <option
                                            value="{{$placaci[0]->placa_id}}" selected>
                                            {{$placaci[0]->placa_id}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ci">CI FUNCIONARIO: <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control" id="ci" name="ci"
                                            style="width: 100%;" data-placeholder="Escoger...">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($funcionariosCi_NoEstanEnAsignaciones as $filaci)
                                            <option
                                                value="{{$filaci->ci}}" {{$filaci->ci==$filaasignacion->ci ? "selected":""}}> {{$filaci->ci}}
                                            </option>
                                        @endforeach
                                        <option
                                            value="{{$placaci[0]->ci}}" selected>
                                            {{$placaci[0]->ci}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_asignacion">FECHA ASIGNACION: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="js-flatpickr form-control bg-white"
                                           id="fecha_asignacion"
                                           name="fecha_asignacion" placeholder="Año-mes-dia"
                                           value="{{$filaasignacion->fecha_asignacion}}"
                                           data-date-format="Y-m-d">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="identificador_memorandum">IDENTIFICADOR MEMORANDUM: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="identificador_memorandum"
                                           value="{{$filaasignacion->identificador_memorandum}}"
                                           id="identificador_memorandum" pattern="[A-Za-z0-9]+">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_conductor_chofer">TIPO ASIGNACION: <span
                                            class="text-danger">*</span></label>
                                    <select class="js-select2 form-control"
                                            id="tipo_conductor_chofer" name="tipo_conductor_chofer"
                                            style="width: 100%;" data-placeholder="Escoger...">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($datosTipoCC as $filaTipoCC)
                                            <option
                                                value="{{$filaTipoCC->tipo_c_c_descripcion}}" {{$filaTipoCC->tipo_c_c_descripcion == $filaasignacion->tipo_conductor_chofer ? "selected":""}}>
                                                {{$filaTipoCC->tipo_c_c_descripcion}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col" data-toggle="appear" data-class="animated zoomIn">
                                <!-- Team Member -->
                                <div class="block">
                                    <div class="block-content">
                                        <div class="{{--row items-push--}} js-gallery img-fluid-100 img-link-zoom-in">
                                            <a class="img-link img-link-zoom-in img-thumb img-lightbox"
                                               href="{{asset('imagenes_store/asignaciones/'.$filaasignacion->archivo_memorandum)}}">
                                                <img class="img-fluid justify-content-center img-link-zoom-in"
                                                     width="100%"
                                                     height="100%" id="src_imagen_perfil"
                                                     src="{{asset('imagenes_store/asignaciones/'.$filaasignacion->archivo_memorandum)}}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                               id="input_imagen_perfil"
                                               name="archivo_memorandum">
                                        <label class="custom-file-label" for=""
                                               style="width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"> {{$filaasignacion->archivo_memorandum}}</label>
                                        {{--<label class="custom-file-label" for="">{{$filaasignacion->archivo_memorandum}}</label>--}}
                                    </div>
                                </div>
                                <!-- END Team Member -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                    style="float: right; width: 100%">
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_funcionario"></div>
        @if(session()->has('alert-danger'))
            <div class='alert alert-danger d-flex align-items-center' role='alert'>
                <div class='flex-00-auto'>
                    <i class='fa fa-fw fa-check'></i>
                </div>
                <div class='flex-fill ml-3'>
                    <p class='mb-0'>  {{ session()->get('alert-danger') }}<a class='alert-link'
                                                                             href='javascript:void(0)'></a>!</p>
                </div>
            </div>
        @endif
        @if(session()->has('alert-success'))
            <div class='alert alert-success d-flex align-items-center' role='alert'>
                <div class='flex-00-auto'>
                    <i class='fa fa-fw fa-check'></i>
                </div>
                <div class='flex-fill ml-3'>
                    <p class='mb-0'>  {{ session()->get('alert-success') }}<a class='alert-link'
                                                                              href='javascript:void(0)'></a>!</p>
                </div>
            </div>
        @endif
        @if (session('status'))
            <div class='alert alert-success d-flex align-items-center' role='alert'>
                <div class='flex-00-auto'>
                    <i class='fa fa-fw fa-check'></i>
                </div>
                <div class='flex-fill ml-3'>
                    <p class='mb-0'>  {{ session('status') }}<a class='alert-link' href='javascript:void(0)'></a>!</p>
                </div>
            </div>
        @endif
    </div>

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

    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ SCRIPT PERSONAL $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    <script>
        /*
        DE: #imagen_perfil A: #src_imagen_perfil_hero  Y A: src_imagen_perfil         HERO
        DE: #ci A: #ci_perfil_hero        					                       HERO CI
        */
        /*##########################################################################################################*/
        /*cunado SE CAMBIE EL INPUT FILE DE IMAGEN_PERFIL PARA LA BD CAMBIA EN DOM EN LOS <IMG SRC=[AquiVaLasIMg] >*/
        $('#input_imagen_perfil').change(function (e) {
            var file = e.target.files[0];
            /*$('#nombre_de_archivo_imagen').val(file.name);*/
            var imageType = 'image.*';
            if (!file.type.match(imageType))
                return;
            $reader = "reader";
            $reader = new FileReader();
            $reader.onload = fileOnload;
            $reader.readAsDataURL(file);
        });

        /*esto de aqui previsulaiza la imagen*/
        function fileOnload(e) {
            var result = e.target.result;
            $('#src_imagen_perfil_hero').attr("src", result);
            $('#src_imagen_perfil').attr("src", result);
        }

        /*##########################################################################################################*/
        function cambioDeNombre() {
            var apellidos = $('#apellidos').val();
            var nombres = $('#nombres').val();
            $('#name_perfil_hero').text(apellidos + " " + nombres);
        }

        /*##########################################################################################################*/
        /*JQUERY PARA ENVIAR FORM DE DATOS VEHICULO*/
        /* $('#form_subir_funcionario').submit(function () {
             $.ajax({
                 method: $(this).attr('method'),
                 url: $(this).attr('action'),
                 data: $(this).serialize(),
                 success: function (data) {
                     $('#boton_exito').click();
                     $('#mensaje_respuesta_form_subir_funcionario').append(
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
         });*/

    </script>

    {{--#################################################### JAVA SCRIPT PERSONAL############################################################--}}
    <script type="text/javascript">
        /*COMO AVERIGUAR DONDE EN DONDE ESTA NUESTRO PROYECTO, POR EJEMPLO SI ESTAMOS EN localhost/proyecto3/proyectosLaravel/GAmeaAutoParkSys/public
        *   NOS MUESTRA EL URL POR MAS QUE ESTE EN VARIAS DIRECIONES HASTA PUBLIC*/
        var APP_URL = {!! json_encode(url('/')) !!};
        console.log(APP_URL);
    </script>
    {{--########################################################################################################################################--}}
    <script>
        /* $(function () {
             $(document).on('change', '#input_file_image', function () {
                 $('#label_file_image').text($(this).val());
             });
         });*/
    </script>

    {{--##############################$ PREVISUALIZAR IMAGEN DESDE INPUT FILE, EN ESCUCHA $##############################--}}
    <script>
        /* $('#input_file_image').change(function (e) {
             var file = e.target.files[0];

             $('#nombre_de_archivo_imagen').val(file.name);

             var imageType = 'image.*';
             if (!file.type.match(imageType))
                 return;
             $reader = "reader";
             $reader = new FileReader();
             $reader.onload = fileOnload;
             $reader.readAsDataURL(file);
         });

         function fileOnload(e) {
             var result = e.target.result;
             $('#images_file').attr("src", result);
         }*/
    </script>
    {{--#################################################################################--}}
    <script>
        function asignarPlacaIdATodaLaPagina() {
            placavehiculo = $('#placa_id').val();

            $('#placa_id_subida_docs_prop_vehiculo').val(placavehiculo);
            $('#placa_id_subida_imgs_perfil_vehiculo').val(placavehiculo);
            $('#placa_id_subida_docs_renov_vehicular').val(placavehiculo);
            $('#placa_id_subir_seguro').val(placavehiculo);
            $('#placa_id_subida_estado_servicio_vehicular').val(placavehiculo);
        }
    </script>

@endsection

