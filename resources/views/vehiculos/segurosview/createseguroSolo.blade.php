@extends('layouts.layoutmaster')
@section('title')
    REGISTRAR SEGURO
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
        @slot('titulo1','Registrar Seguros')
        {{--<li class="breadcrumb-item">SECCION 2</li>
        <li class="breadcrumb-item">IMAGENES DE PERFIL</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Generar Registrar Nuevo</a>
        </li>--}}
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}

@section('hero_cuadro_bienvenida')
    <!-- Hero -->

    <!-- END Hero -->
    {{--@include('componentes.4_A_Hero(otrabienvenida)')--}}
@endsection
@section('content')

    @include('components.alerts.alerttre')

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
                {{--<input type="text" name="placa_id" value=""
                       id="placa_id_subir_seguro">--}} {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ placa oculta $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
                <table class="table table-bordered table-striped table-vcenter{{-- js-dataTable-buttons--}}">
                    <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">PLACA</th>
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
                        <button type="submit" class="btn btn-primary shadow rounded" style="float: right;">GUARDAR
                        </button>
                    </div>
                </div>
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

        /*JQUERY PARA ENVIAR FORM DE DATOS VEHICULO*/
        $('#form_subir_datos_vehiculo').submit(function () {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $('#mensaje_respuesta_form_subir_datos_vehiculo').html(data);
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
                    $('#mensaje_respuesta_form_subir_est_serv_vehicular').html(data);
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
                    alert("file uploaded");
                });

                this.on("complete", function (file) {
                    myDropzoneDocsProp.removeFile(file);
                });

                this.on("success",
                    myDropzoneDocsProp.processQueue.bind(myDropzoneDocsProp)
                );
            }
        };

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
                    alert("file uploaded");
                });

                this.on("complete", function (file) {
                    myDropzoneImgsPerfil.removeFile(file);
                });

                this.on("success",
                    myDropzoneImgsPerfil.processQueue.bind(myDropzoneImgsPerfil)
                );
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
        /*JQUERY PARA ENVIAR FORM DE SUBIR SEGUROS DE VEHICULO*/
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
                bloque_subida_docs_prop_vehiculo
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

        var vehiculo_placa_id ="{{$vehiculo_placa_id}}";
        var placasimprim = "";
        placasimprim = placasimprim + "<option value='" + vehiculo_placa_id + "' selected>" + vehiculo_placa_id + "</option>";
        /*"<input type='text' name='placa_id[]' value='' id='placa_id_subir_seguro'>"+*/
        var contador = 0;
        $(document).on('click', '#btn_generar_filas', function () {
            contador = contador + 1;
            $('#body_tb_form_in').append(
                "<tr>" +
                "<td class='text-center font-size-sm'>" +

                    "<select class='form-control' name='placa_id[]' placeholder='Escoger...' required>" +
                            "<option></option>" +
                            placasimprim +
                    "</select>" +

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
                "<input type='file' class='archiv' value='' id='archiv' name='campoe[]' required>" +
                /*"<label class='custom-file-label' id='archiv nfile' id='nfile'></label>" + .custom-file-input*/
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

        });
        $(document).on('click', '.btn-eliminar', function () {
            $(this).parent().remove();
        })

        /*$(document).on('change','.archiv',function () {
            alert($(this).val());
        });*/

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

