@foreach($datosfuncionarios as $filafuncionario)
@endforeach

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

@section('imagen_avatar', asset('imagenes_store/funcionarios/'.$filafuncionario->ci."/".$filafuncionario->imagen_perfil))
@section('texto_en_h1',$filafuncionario->apellidos." ".$filafuncionario->nombres)



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
            <h3 class="block-title">{{--FORMULARIO--}}</h3>
        </div>
        <div class="block-content block-content-full">
            {{--<form action="{{route('funcionario.update', $filafuncionario->ci)}}" method="POST"
                  enctype="multipart/form-data"
                  id="form_subir_funcionario">--}}
            @csrf
            @method('PUT')
            {{-- ############### FORMULARIO EN EL CENTRO ############--}}
            <div class="row push justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="row">
                        <div class="col" data-toggle="appear" data-class="animated zoomIn">
                            <!-- Team Member -->
                            <div class="block">
                                <div class="block-content text-center">
                                    <img
                                        src="{{asset('imagenes_store/funcionarios/'.$filafuncionario->ci."/".$filafuncionario->imagen_perfil)}}"
                                        width="50%"
                                        height="50%" id="src_imagen_perfil"
                                        class="justify-content-center">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                           id="input_imagen_perfil"
                                           name="imagen_perfil">
                                    <label class="custom-file-label"
                                           for="input_imagen_perfil">{{$filafuncionario->imagen_perfil}}</label>
                                </div>
                            </div>
                            <!-- END Team Member -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row push">
                <div class="col-lg-2">
                    <div class="row">
                    </div>
                </div>
                <div class="col-lg-8">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ci">CI: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control btn-success" name="ci" id="ci"
                                       placeholder="solo numero..."
                                       value="{{$filafuncionario->ci}}"
                                       required pattern="[0-9]+" title="Ingrese solo números">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="ci_exped_en">EXP: <span class="text-danger">*</span></label>
                                <select class="js-select2 form-control" id="ci_exped_en" name="ci_exped_en"
                                        style="width: 100%;" data-placeholder="Escoger..." required>
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($datosciexpedicoens as $filaciexpen)
                                        <option value="{{$filaciexpen->ci_exped_en_descripcion}}"
                                            {{$filaciexpen->ci_exped_en_descripcion == $filafuncionario->ci_exped_en ? "selected":""}}> {{$filaciexpen->ci_exped_en_descripcion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apellidos">APELLIDOS: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                       value="{{$filafuncionario->apellidos}}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombres">NOMBRES: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nombres" id="nombres"
                                       onchange="cambioDeNombre()" required
                                       value="{{$filafuncionario->nombres}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_nac">FECHA NACIMIENTO: <span class="text-danger">*</span></label>
                                <input type="text" class="js-flatpickr form-control bg-white"
                                       id="fecha_nac"
                                       name="fecha_nac" placeholder="Año-mes-dia"
                                       data-date-format="Y-m-d"
                                       value="{{$filafuncionario->fecha_nac}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="numero_licencia">NUMERO LICENCIA: </label>
                                <input type="text" class="form-control" name="numero_licencia" id="numero_licencia"
                                       pattern="[A-Za-z0-9]+"
                                       value="{{$filafuncionario->numero_licencia}}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="categoria_licencia">CAT..: </label>
                                <select class="js-select2 form-control" id="categoria_licencia"
                                        name="categoria_licencia"
                                        style="width: 100%;" data-placeholder="Escoger...">
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($datoscategorialicencias as $filacategorialicencia)
                                        <option
                                            value="{{$filacategorialicencia->categoria_licencia_descripcion}}"
                                            {{$filacategorialicencia->categoria_licencia_descripcion == $filafuncionario->categoria_licencia ? "selected":""}}
                                        > {{$filacategorialicencia->categoria_licencia_descripcion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_expedicion_licencia">FECHA EXPEDICION LICENCIA: </label>
                                <input type="text" class="js-flatpickr form-control bg-white"
                                       id="fecha_expedicion_licencia"
                                       name="fecha_expedicion_licencia" placeholder="Año-mes-dia"
                                       data-date-format="Y-m-d"
                                       value="{{$filafuncionario->fecha_expedicion_licencia}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_vencimiento_licencia">FECHA VENCIMIENTO LICENCIA: </label>
                                <input type="text" class="js-flatpickr form-control bg-white"
                                       id="fecha_vencimiento_licencia"
                                       name="fecha_vencimiento_licencia" placeholder="Año-mes-dia"
                                       data-date-format="Y-m-d" required
                                       value="{{$filafuncionario->fecha_vencimiento_licencia}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_accidentes">NUMERO DE ACCIDENTES: </label>
                                <input type="text" class="form-control" name="numero_accidentes"
                                       id="numero_accidentes"
                                       pattern="[0-9]+" title="Solo ingresar números"
                                       value="{{$filafuncionario->numero_accidentes}}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="departamento_id">DEPARTAMENTO(): </label>
                                <select class="js-select2 form-control" id="departamento_id" name="departamento_id"
                                        style="width: 100%;" data-placeholder="Escoger...">
                                    <option></option>
                                    @foreach($datosdepartamentos as $filadepartamento)
                                        <option
                                            value="{{$filadepartamento->departamento_id}}"
                                            {{$filadepartamento->departamento_id == $filafuncionario->departamento_id ? "selected":""}} >
                                            {{$filadepartamento->departamento_id}}
                                            : {{$filadepartamento->departamento_nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="contacto">CONTACTO: </label>
                                <input type="text" class="form-control" name="contacto" id="contacto"
                                       placeholder="telefono, celular, correo...."
                                       value="{{$filafuncionario->contacto}}">
                            </div>
                        </div>
                        @php
                            $numerodeestados = count(json_decode($datosestadosfuncs));
                        @endphp
                        <div class="col-md-8">
                            <label class="mb-4">ESTADO FUNCIONARIO: <span class="font-italic">(Arrastre o haga click en la barra por favor)</span></label>
                            <input type="text" class="js-rangeslider" id="estado_func_descripcion"
                                   name="estado_func_descripcion"
                                   value="{{$filafuncionario->estado_func_descripcion}}"
                                   data-grid="true" data-from="
                                        @for($i = 0;$i<$numerodeestados; $i++)
                            {{$datosestadosfuncs[$i]->estado_func_descripcion == $filafuncionario->estado_func_descripcion ? $i:""}}
                            @endfor
                                "
                                   data-values="
                                       @foreach($datosestadosfuncs as $filaestadofun)
                                   {{$filaestadofun->estado_func_descripcion}},
                                       @endforeach
                                       ">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <p class="font-size-sm text-muted">
                        .
                    </p>
                </div>

            </div>

            {{--</form>--}}
        </div>
        <div id="mensaje_respuesta_form_subir_funcionario"></div>
    </div>

    @foreach($asiganciones as $asignacion)
    @endforeach
    @if(empty($asignacion->placa_id))
        <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
            <div class="row">
                <div class="col-lg-12 text-center justify-content-center">
                    <label for="" class="btn btn-danger">
                        <span class="font-italic">NO EXISTE ASIGNACION</span>
                    </label>
                </div>
            </div>
        </div>
    @else
        {{-- DATOS DE ASIGNACION  --}}
        @foreach($datosvehiculo as $filavehiculo)
        @endforeach

        @foreach($asiganciones as $filaasignacion)
        @endforeach
        <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
            <div class="block-header">
                <h3 class="block-title">
                    <i class="fa fa-play fa-fw text-primary"></i>
                    DATOS DE ASIGNACION
                    <a href="{{route('asignacion.show', $filaasignacion->asignacion_id)}}" class="btn btn-info shadow" style="float: right;">IR A </a>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <form action="{{route('asignacion.store')}}" method="POST" enctype="multipart/form-data"
                      id="form_subir_funcionario">
                    @csrf
                    @method('POST')
                    {{--############### FORMULARIO EN EL CENTRO ############--}}
                    <div class="row push">
                        <div class="col-lg-0">
                            <div class="row">
                                <div class="col" data-toggle="appear" data-class="animated zoomIn">
                                    <!-- Team Member -->
                                    <div class="block">

                                    </div>

                                    <div class="form-group">

                                    </div>
                                    <!-- END Team Member -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="placa_id">PLACA: </label>
                                        <input type="text" class="form-control btn-success" id="placa_id"
                                               name="placa_id" value="{{$filavehiculo->placa_id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="numero_crpva">RCPVA: </label>
                                        <input type="text" class="form-control " id="numero_crpva"
                                               name="numero_crpva" value="{{$filavehiculo->numero_crpva}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for=documento_importacion">DOCUMENTO DE IMPORTACION: </label>
                                        <input type="text" class="form-control"
                                               id="documento_importacion" name="documento_importacion"
                                               value="{{$filavehiculo->documento_importacion}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for=numero_documento_importacion">NUMERO DOCUMENTO DE
                                            IMPORTACION: </label>
                                        <input type="text" class="form-control"
                                               id="numero_documento_importacion" name="numero_documento_importacion"
                                               value="{{$filavehiculo->numero_documento_importacion}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="clase_id">CLASE: </label>
                                        <input type="text" class=" form-control" id="clase_id"
                                               name="clase_id" style="width: 100%;"
                                               value="{{$filavehiculo->clase_descripcion}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for=marca_id">MARCA: </label>
                                        <input type="text" class="form-control" id="marca_id"
                                               name="marca_id" style="width: 100%;"
                                               value="{{$filavehiculo->marca_descripcion}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for=tipo_uso_id">TIPO USO: </label>
                                        <input type="text" class="form-control" id="tipo_uso_id"
                                               name="tipo_uso_id" style="width: 100%;"
                                               value="{{$filavehiculo->tipo_uso_descripcion}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for=fecha_incorporacion_institucion">FECHA DE INCORPORACION A
                                            INSTITUCION: </label>
                                        <input type="text" class="form-control" id="fecha_incorporacion_institucion"
                                               name="fecha_incorporacion_institucion" style="width: 100%;"
                                               value="{{$filavehiculo->fecha_incorporacion_institucion}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="identificador_memorandum">IDENTIFICADOR MEMORANDUM: </label>
                                        <input type="text" class="form-control btn-info"
                                               name="identificador_memorandum"
                                               value="{{$filaasignacion->identificador_memorandum}}"
                                               id="identificador_memorandum"
                                               style="width: 310px;"
                                               pattern="[A-Za-z0-9]+">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tipo_conductor_chofer">TIPO ASIGNACION: </label>
                                        <input type="text" class="form-control"
                                               name="tipo_conductor_chofer"
                                               value="{{$filaasignacion->tipo_conductor_chofer}}"
                                               id="tipo_conductor_chofer"
                                               style="width: 310px;"
                                               pattern="[A-Za-z0-9]+">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_asignacion">FECHA ASIGNACION: </label>
                                        <input type="text" class="js-flatpickr form-control bg-white"
                                               data-inline="true"
                                               id="fecha_asignacion"
                                               name="fecha_asignacion" placeholder="Año-mes-dia"
                                               value="{{$filaasignacion->fecha_asignacion}}"
                                               style="width: 310px;"
                                               data-date-format="Y-m-d">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="estado_service">ESTADO DE SERVICIO: </label>
                                        <input type="text" name="estado_service" id="estado_service"
                                               value="{{$estadoservvehi[0]->est_descripcion}}"
                                               style="width: 310px;"
                                               class="form-control btn {{$estadoservvehi[0]->est_descripcion == "EN SERVICIO"? "btn-success":"btn-danger"}}"
                                               style="height: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col" data-toggle="appear" data-class="animated zoomIn">
                                    <label for="" class="text-center justify-content-center">(Memorandum)</label>

                                    <!-- Team Member -->
                                    <div class="block">
                                        <div class="block-content">
                                            <div class="js-gallery img-fluid-100 img-link-zoom-in">
                                                <a href="{{asset('imagenes_store/asignaciones/'.$filaasignacion->archivo_memorandum)}}"
                                                   class="img-link-zoom-in img-thumb img-lightbox justify-content-center">
                                                    <img class="justify-content-center img-link-zoom-in img-fluid"
                                                         src="{{asset('imagenes_store/asignaciones/'.$filaasignacion->archivo_memorandum)}}"
                                                         width="100%"
                                                         height="100%" id="src_imagen_perfil"
                                                    >
                                                </a>
                                            </div>

                                            <div class="form-group">

                                                <div class="custom-file">
                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                    <input type="file" class="custom-file-input"
                                                           data-toggle="custom-file-input"
                                                           id=""
                                                           name="">
                                                    <label class="custom-file-label"
                                                           style="width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"
                                                           for=""> {{$filaasignacion->archivo_memorandum}}</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END Team Member -->
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="row">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                        style="float: right; width: 100%">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </div>--}}
                </form>
            </div>
            <div id="mensaje_respuesta_form_subir_funcionario"></div>
        </div>




        {{--SLIDER DE IMAGENES DE IMAGENES DE PERFIL SEGUN PLACA ID--}}
        <div class="block shadow p-2 mb-1 rounded" data-toggle="appear"
             data-class="animated bounceIn">

            <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-arrows="true"
                 data-slides-to-show="3" data-center-mode="true" data-autoplay="true" data-autoplay-speed="3000">
                @foreach($imagenesPerfilVehiculo as $filaimagenperfil)
                    <div class="{{--row items-push--}} js-gallery img-fluid-100">
                        {{--<div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">--}}
                        <a class="img-link img-link-zoom-in img-thumb img-lightbox"
                           href="{{asset('imagenes_store/vehiculos/'.$filaimagenperfil->archivo_subido.'')}}">
                            <img class="img-fluid"
                                 src="{{asset('imagenes_store/vehiculos/'.$filaimagenperfil->archivo_subido.'')}}">
                        </a>
                        {{--</div>--}}
                    </div>
                @endforeach
            </div>
        </div>

    @endif


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

