@extends('layouts.layoutmaster')
@section('title')
    INFORMACION SEGURO
@endsection
@section('styles')
    {{--#################### START CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_css')
    {{--#################### END CSS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    {{-- ################ START CSSS SCRIPT PARA DATATABLESS ###############--}}
    @include('components.links_css_js.datatable.datatable_css')
    {{--######################## END CSS SCRIPT DATABLE ####################--}}
    {{--##################### START CAROUSEL CSS #####################--}}
    @include('components.links_css_js.carousel.carousel_css')
    {{--##################### END CAROUSEL CSS #####################--}}
@endsection

{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Informacion Seguro')
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

@endsection
@section('content')

    {{--<div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="row">
            <div class="col-lg-12">--}}
    {{--<button id="btn_generar_filas" class="btn btn-primary shadow rounded"
            style="float: right; justify-content: end;">
        <i class="fas fa-plus-circle"></i> GENERAR CAMPOS
    </button>--}}
    {{--</div>
</div>
</div>--}}

    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div {{--class="block invisible" data-toggle="appear" data-class="animated bounceIn"--}}> {{--esta parte hace que la tabal tenga amimacion--}}
            <form action="{{route('seguro.update',$seguro->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">N° PLACA</th>
                        <th class="d-none d-sm-table-cell">GESTION</th>
                        <th class="d-none d-sm-table-cell">DESCRIPCION</th>
                        <th class="d-none d-sm-table-cell">EMPRESA ASEGURADORA</th>
                        <th class="d-none d-sm-table-cell">FECHA DE VIGENCIA</th>
                        <th class="d-none d-sm-table-cell" style="width:13%;">ARCHIVOS SUBIDOS</th>
                        <th class="d-none d-sm-table-cell"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center font-size-sm">
                            {{$seguro->placa_id}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$seguro->gestion}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$seguro->texto}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$seguro->empresa_aseguradora}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$seguro->fecha_vigencia}}
                        </td>
                        {{--$$$$$$$$$$$$$$  input files $$$$$$$$$$$$$$--}}
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <div class="col-md-12" style="float: right;">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                       id="input_file_image" name="example-file-input-custom">
                                <label class="custom-file-label" for="input_file_image"
                                       style="width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"
                                       id="label_file_image">{{$seguro->archivo_subido}}</label>
                            </div>
                        </td>
                        <td class="justify-content-center">
                            <div class="mb-2">
                                <a href="{{route('seguro.edit', $seguro->id)}}"
                                   class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                   title="EDITAR">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </td>
                        {{--$$$$$$$$$$$$$$  input files $$$$$$$$$$$$$$--}}
                    </tr>
                    </tbody>
                </table>
                {{--<div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary shadow rounded" style="float: right;">ENVIAR
                        </button>
                    </div>
                </div>--}}
            </form>
        </div>

    </div>

    {{--###########################################$ PREVISULAIZAR IMAGEN DESDE INPUT FILE $#########################################--}}

    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row">
            <div class="col-sm-6 col-xl-2 invisible" data-toggle="appear" data-class="animated zoomIn">
            </div>
            <div class="col-sm-6 col-xl-8 invisible" data-toggle="appear" data-class="animated zoomIn">
                <!-- Team Member -->
                <div class="block">
                    <div class="block-header">
                    </div>
                    <div class="block-content font-size-sm">
                        <img src="{{asset('imagenes_store/seguros/'.$seguro->archivo_subido)}}" width="100%"
                             height="100%" id="images_file"
                             class="justify-content-center"
                             style="justify-content: center;">
                        <div class="row">
                            <div class="col">
                                <input type="text" value="{{$seguro->archivo_subido}}" id="nombre_de_archivo_imagen"
                                       class="form-control btn btn-info"
                                       style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Team Member -->
            </div>
            <div class="col-sm-6 col-xl-2 invisible" data-toggle="appear" data-class="animated zoomIn">
            </div>
        </div>
    </div>
    <!-- END Page Content -->


@endsection

@section('js_script_import')
    {{--############################ START SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}
    @include('components.links_css_js.pluginsform.plugin_form_js')
    {{--############################ END SCRIPTS PLUGINS PARA FORMS VALIDATIONS Page JS Plugins CSS BE_FORM_PLUGINS ####################--}}

    {{-- ################ START SCRIPTS PARA DATATABLESS ###############--}}
    @include('components.links_css_js.datatable.datatable_js')
    {{--######################## END SCRIPT DATABLE ####################--}}

    {{-- ################ START CONFIRMAR ELIMINACION FORM ###############--}}
    @include('components.confirmation.confirmationdelete_js')
    {{-- ################# END CONFIRMAR ELIMINACION FORM ###############--}}

    {{--###################### START SCRIPT JS CARROUSEL ####################--}}
    @include('components.links_css_js.carousel.carousel_js')
    {{--###################### END SCRIPT JS CARROUSEL ####################--}}

    {{--#################################################### JAVA SCRIPT PERSONAL############################################################--}}
    <script type="text/javascript">
        /*COMO AVERIGUAR DONDE EN DONDE ESTA NUESTRO PROYECTO, POR EJEMPLO SI ESTAMOS EN localhost/proyecto3/proyectosLaravel/GAmeaAutoParkSys/public
        *   NOS MUESTRA EL URL POR MAS QUE ESTE EN VARIAS DIRECIONES HASTA PUBLIC*/
        var APP_URL = {!! json_encode(url('/')) !!};
        console.log(APP_URL);
    </script>
    {{--########################################################################################################################################--}}
    <script>
        $(function () {
            $(document).on('change', '#input_file_image', function () {
                $('#label_file_image').text($(this).val());
            });
        });
    </script>

    {{--##############################$ PREVISUALIZAR IMAGEN DESDE INPUT FILE, EN ESCUCHA $##############################--}}
    <script>
        $('#input_file_image').change(function (e) {
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
        }
    </script>

@endsection

