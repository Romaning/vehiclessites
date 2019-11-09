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
@section('hero_cuadro_bienvenida')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url({{asset('image_proyect/fondo_hero3.jpg')}});">
        <div class="bg-black-50">
            <div class="content content-full text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb"
                         src="{{asset('imagenes_store/funcionarios/'.$filafuncionario->ci."/".$filafuncionario->imagen_perfil)}}" alt=""
                         id="src_imagen_perfil_hero">
                </div>
                <h1 class="h2 text-white mb-0" id="name_perfil_hero"></h1>
                <span class="text-white-75" >
                    Nombre Funcionario
                </span>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    {{--@include('componentes.4_A_Hero(otrabienvenida)')--}}
@endsection
@section('content')
    {{--
    'ci',
    'ci_exped_en',
    'apellidos',
    'nombres',
    'fecha_nac',
    'categoria_licencia',
    'numero_licencia',
    'fecha_expedicion_licencia',
    'fecha_vencimiento_licencia',
    'numero_accidentes',
    'contacto',
    'imagen_perfil',
    'estado_func_id',
    'departamento_id',
    --}}
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
            <form action="{{route('funcionario.store')}}" method="POST" enctype="multipart/form-data"
                  id="form_subir_funcionario">
                @csrf
                @method('POST')
                {{-- ############### FORMULARIO EN EL CENTRO ############--}}
                <div class="row push justify-content-center">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col" data-toggle="appear" data-class="animated zoomIn">
                                <!-- Team Member -->
                                <div class="block">
                                    <div class="block-content">
                                        <img src="{{asset('imagenes_store/funcionarios/'.$filafuncionario->ci."/".$filafuncionario->imagen_perfil)}}" width="100%"
                                             height="100%" id="src_imagen_perfil"
                                             class="justify-content-center">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                               id="input_imagen_perfil"
                                               name="imagen_perfil">
                                        <label class="custom-file-label" for="input_imagen_perfil">{{$filafuncionario->imagen_perfil}}</label>
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
                                    <input type="text" class="form-control btn-success" name="ci" id="ci" placeholder="solo numero..."
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
                                        {{--@foreach($datosciexpedicoens as $filaciexpen)--}}
                                        <option value="{{$filafuncionario->ci_exped_en}}" selected>{{$filafuncionario->ci_exped_en}}</option>
                                        {{--@endforeach--}}
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
                                    <input type="text" class="form-control" name="nombres" id="nombres" onchange="cambioDeNombre()" required
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
                                    <input type="text" class="form-control" name="numero_licencia" id="numero_licencia" pattern="[A-Za-z0-9]+"
                                           value="{{$filafuncionario->numero_licencia}}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="categoria_licencia">CAT..: </label>
                                    <select class="js-select2 form-control" id="categoria_licencia" name="categoria_licencia"
                                            style="width: 100%;" data-placeholder="Escoger...">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        {{--@foreach($datoscategorialicencias as $filacategorialicencia)--}}
                                        <option
                                            value="{{$filafuncionario->categoria_licencia}}" selected>{{$filafuncionario->categoria_licencia}}</option>
                                        {{--@endforeach--}}
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
                                        {{--@foreach($datosdepartamentos as $filadepartamento)--}}
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option
                                            value="{{$filafuncionario->departamento_id}}" selected>{{$filafuncionario->departamento_id}}: {{$filafuncionario->departamento_nombre}}</option>
                                        {{--@endforeach--}}
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
                            <div class="col-md-8">
                                <label class="mb-4">ESTADO FUNCIONARIO: <span
                                        class="font-italic">{{--(Arrastre o haga click en la barra por favor)--}}</span></label>
                                @if($filafuncionario->estado_func_descripcion=="ACTIVO")
                                    <input type="text" class="{{--js-rangeslider--}} form-control btn-success"
                                           id="estado_func_descripcion" name="estado_func_descripcion"
                                           value="{{$filafuncionario->estado_func_descripcion}}"
                                           data-grid="true" data-from="0"
                                           data-values="
                                       {{--@foreach($datosestadosfuncs as $filaestadofun)--}}
                                           ,
                                       {{--@endforeach--}}
                                               ">
                                    @else
                                    <input type="text" class="{{--js-rangeslider--}} form-control btn-danger"
                                           id="estado_func_descripcion" name="estado_func_descripcion"
                                           value="{{$filafuncionario->estado_func_descripcion}}"
                                           data-grid="true" data-from="0"
                                           data-values="
                                       {{--@foreach($datosestadosfuncs as $filaestadofun)--}}
                                       {{--@endforeach--}}
                                               ">
                                @endif

                            </div>
                        </div>
                        {{--<div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success shadow p-2 mb-1 rounded"
                                            style="float: right;">
                                        GUARDAR
                                    </button>
                                </div>
                            </div>
                        </div>--}}
                    </div>

                    <div class="col-lg-2">
                        <p class="font-size-sm text-muted">
                            .
                        </p>
                    </div>

                </div>

            </form>
        </div>
        <div id="mensaje_respuesta_form_subir_funcionario"></div>
    </div>

    <form action="{{route('funcionario.store')}}" method="POST" enctype="multipart/form-data" class="d-none">
        @csrf
        @method('POST')
        <div class="form-group mb-5">
            <label class="mb-4">Custom</label>
            <input type="text" class="js-rangeslider" id="example-rangeslider7" name="example-rangeslider7"
                   data-grid="true" data-from="2"
                   data-values="January, February, March, April, May, June, July, August, September, October, November, December">
        </div>
        <button type="submit">
            GUARDAR
        </button>
    </form>

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
        function cambioDeNombre(){
            var apellidos  = $('#apellidos').val();
            var nombres = $('#nombres').val();
            $('#name_perfil_hero').text(apellidos+" "+nombres);
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

