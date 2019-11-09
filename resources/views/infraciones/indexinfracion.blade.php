@extends('layouts.layoutmaster')
@section('title')
    INFRACCIONES
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
        @slot('titulo1','Tabla de Infracciones')
        <li class="breadcrumb-item">SECCION 3</li>
        <li class="breadcrumb-item">INFRACCIONES</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Infracciones</a>
        </li>
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
    @csrf
    <div class="block">
        <div class="block-content block-content-full block invisible shadow rounded" data-toggle="appear"
             data-class="animated bounceIn">
            <div>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">ID</th>
                        <th class="d-none d-sm-table-cell">PLACA</th>
                        <th class="d-none d-sm-table-cell">GESTION</th>
                        <th class="d-none d-sm-table-cell">FECHA</th>
                        <th class="d-none d-sm-table-cell">SERIE</th>
                        <th class="d-none d-sm-table-cell">BOLETA</th>
                        <th class="d-none d-sm-table-cell">CODIGO</th>
                        <th class="d-none d-sm-table-cell">DESCRIPCION</th>
                        <th class="d-none d-sm-table-cell">MONTO</th>
                        <th style="width:10%" class="text-sm-center font-size-sm">
                            <a href="{{route('infraccion.create')}}"
                               class="btn-sm btn-primary shadow rounded">
                                <i class="fa fa-plus-circle"></i> Añadir
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($infracionesInst as $filainfracion)
                        <tr>
                            <td class="text-center font-size-sm">
                                {{$filainfracion->infraccion_id}}
                            </td>
                            <td class="text-center">
                                {{$filainfracion->placa_id}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filainfracion->gestion}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filainfracion->fecha_infraccion}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filainfracion->serie}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filainfracion->boleta}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filainfracion->condigo}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filainfracion->descripcion}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filainfracion->monto}}
                            </td>
                            <td class="justify-content-center">
                                <div class="row text-sm-center">
                                    <div class="col-sm-1">
                                        <a href="{{route('infraccion.show',$filainfracion->infraccion_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="VER INFORMACION COMPLETA">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="{{route('infraccion.edit',$filainfracion->infraccion_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="EDITAR">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <form
                                            action="{{route('infraccion.destroy',$filainfracion->infraccion_id)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button href="" type="submit" class="btn btn-sm btn-light push mb-md-0"
                                                    data-toggle="tooltip"
                                                    title="ELIMINAR">
                                                <i class="fa fa-trash"></i>
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
@endsection

