@extends('layouts.layoutmaster')
@section('title')
    SEGUROS
@endsection
@section('styles')
    {{-- ################ START CSSS SCRIPT PARA DATATABLESS ###############--}}
    @include('components.links_css_js.datatable.datatable_css')
    {{--######################## END CSS SCRIPT DATABLE ####################--}}
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Tabla Seguros')
        <li class="breadcrumb-item">SECCION 2</li>
        <li class="breadcrumb-item">SEGUROS</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">De Todos Los Vehiculos</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('hero_cuadro_bienvenida')

@endsection
@section('content')
    @include('components.alerts.alerttre')
    @csrf
    <div class="block">
        <div class="block-content block-content-full block invisible shadow rounded" data-toggle="appear"
             data-class="animated bounceIn{{--bounceIn--}}">
            <div {{--class="block invisible" data-toggle="appear" data-class="animated bounceIn"--}}> {{--esta parte hace que la tabal tenga amimacion--}}
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
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
                        <th style="width:10%;" class="text-sm-center font-size-sm">
                            <a href="{{route('seguro.create')}}"
                               class="btn-sm btn-primary shadow rounded">
                                <i class="fa fa-plus-circle"></i> Añadir
                            </a>
                        </th>
                        {{-- <th style="width: 15%;">Botones</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datosseguro as $filadatosseguro)
                        <tr>
                            <td class="text-center font-size-sm">
                                {{$filadatosseguro->placa_id}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadatosseguro->gestion}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadatosseguro->texto}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadatosseguro->empresa_aseguradora}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadatosseguro->fecha_vigencia}}
                            </td>
                            <td class="text-sm-center font-size-sm">
                                <div class="custom-file">
                                    <div class="col-md-12" style="float: right;">
                                        <input type="file" class="custom-file-input col-md-1" data-toggle="custom-file-input"
                                               name="campoe" id="archiv">
                                        <label class="custom-file-label" for="archiv"
                                               style="width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"
                                               id="nfile">{{$filadatosseguro->archivo_subido}}</label>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                <img class="img-avatar img-avatar48"
                                     src="{{asset('imagenes_store/seguros/'.$filadatosseguro->archivo_subido.'' )}}"
                                     alt="">
                            </td>
                            <td class="justify-content-center">
                                <div class="row text-sm-center">
                                    <div class="col-sm-1">
                                        <a href="{{route('seguro.show',$filadatosseguro->id)}}"
                                           class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                           title="VER INFORMACION COMPLETA">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="{{route('seguro.edit',$filadatosseguro->id)}}"
                                           class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                           title="EDITAR">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <form action="{{route('seguro.destroy',$filadatosseguro->id)}}"
                                              @include('components.confirmation.confirmdel')
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                                    title="ELIMINAR">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js_script_import')
    {{-- ################ START SCRIPTS PARA DATATABLESS ###############--}}
    @include('components.links_css_js.datatable.datatable_js')
    {{--######################## END SCRIPT DATABLE ####################--}}

    {{-- ################ START CONFIRMAR ELIMINACION FORM ###############--}}
    @include('components.confirmation.confirmationdelete_js')
    {{-- ################# END CONFIRMAR ELIMINACION FORM ###############--}}

    {{--#################### js #################--}}
    <script>
        var nuveorequerimiento = $('#body_tb_insertar_campos').html();
        $(document).on('click', '#btn_generar_filas', function () {
            /*contador = contador +1;*/
            $('#body_tb_insertar_campos').append(nuveorequerimiento);
            $(".datepickerr"/*+contador*/).flatpickr();
            $(".datepickerr"/*+contador*/).flatpickr("option", "dateFormat", "yy-mm-dd");
        });

        $(document).on('click', '.btn-eliminar', function () {
            $(this).parent().remove();
        })


        document.getElementById('archiv').onchange = function () {
            console.log(this.value);
            document.getElementById('nfile').innerHTML = document.getElementById('archiv').files[0].name;
        }
    </script>
@endsection

