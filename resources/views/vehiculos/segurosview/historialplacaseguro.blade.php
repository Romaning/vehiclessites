@extends('layouts.layoutmaster')
@section('title')
    HISTORIAL SEGURO
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
        @slot('titulo1','Historial Seguros')
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
    @csrf

    {{--<div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
        <div class="row">
            <div class="col-lg-12">--}}
                {{--<a href="{{ route('seguro.create') }}" class="btn-sm btn-primary shadow rounded"
                   style="float: right; justify-content: end;">
                    <i class="fas fa-plus-circle"></i> AÑADIR
                </a>--}}
            {{--</div>
        </div>
    </div>--}}

    <div class="block shadow p-2 mb-1 rounded" data-toggle="appear" data-class="animated bounceIn">
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
                    <th class="d-none d-sm-table-cell" style="width:12%;">ARCHIVOS SUBIDOS</th>
                    <th class="d-none d-sm-table-cell" style="width:3%;">IMG</th>
                    <th style="width:10%;" class="text-sm-center font-size-sm">
                        <a href="{{ route('seguro.createsolo',$datosseguro[0]->placa_id) }}" class="btn-sm btn-primary shadow rounded"
                           style="float: right; justify-content: end;">
                            <i class="fas fa-plus-circle"></i> AÑADIR
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody id="body_tb_form_in">
                @foreach($datosseguro as $seguro)
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

                        <td class="d-none d-sm-table-cell font-size-sm">
                            <div class="col-md-12" style="float: right;">
                                <input type="file" class="custom-file-input {{--form-control --}} form-control-sm" value="" id="archiv" name="campoe">
                                <label class="custom-file-label" for="archiv"
                                       style="width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"
                                       id="nfile">{{$seguro->archivo_subido}}</label>
                            </div>
                        </td>

                        <td class="d-none d-sm-table-cell font-size-sm">
                            <img class="img-avatar img-avatar48"
                                 src="{{asset('imagenes_store/seguros/'.$seguro->archivo_subido.'' )}}"
                                 alt="">
                        </td>
                        <td class="text-sm-center font-size-sm">
                            <div class="row text-sm-center">
                                <div class="col col-xl-3">
                                    <a href="{{route('seguro.show',$seguro->id)}}"
                                       class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                       title="VER INFORMACION COMPLETA">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                <div class="col-xl-3">
                                    <a href="{{route('seguro.edit',$seguro->id)}}"
                                       class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                       title="EDITAR">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                                <div class="col-xl-3">
                                    <form action="{{route('seguro.destroy',$seguro->id)}}"
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
@endsection

