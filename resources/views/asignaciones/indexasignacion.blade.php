@extends('layouts.layoutmaster')
@section('title')
    ASIGNACIONES
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
        @slot('titulo1','Tabla Asignaciones')
        <li class="breadcrumb-item">SECCION 3</li>
        <li class="breadcrumb-item">ASIGNACIONES</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Asignaciones</a>
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
    @csrf
    <div class="block">
        <div class="block-content block-content-full block invisible shadow rounded" data-toggle="appear"
             data-class="animated bounceIn">
            <div class="block-content">
                <div>
                    {{--<table class="table table-bordered table-striped table-vcenter">--}}
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th class="d-none d-sm-table-cell">COORD</th>
                            <th class="d-none d-sm-table-cell">IDENTIFICADOR MEMO</th>
                            <th class="d-none d-sm-table-cell">FECHA ASIGNACION</th>
                            <th class="d-none d-sm-table-cell">CI</th>
                            <th class="d-none d-sm-table-cell">PLACA</th>
                            <th class="d-none d-sm-table-cell">TIPO</th>
                            <th class="d-none d-sm-table-cell">ARCHIVO MEMO</th>
                            <th style="width:10%" class="text-sm-center font-size-sm">
                                <a href="{{route('asignacion.create')}}"
                                   class="btn-sm btn-primary shadow rounded">
                                    <i class="fa fa-plus-circle"></i> Añadir
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datosasiganciones as $filaasigancion)
                            <tr>
                                <td class="text-center font-size-sm">
                                    {{$filaasigancion->asignacion_id}}
                                </td>
                                <td class="text-center">
                                    {{$filaasigancion->coord_asig}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm">
                                    {{$filaasigancion->identificador_memorandum}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm">
                                    {{$filaasigancion->fecha_asignacion}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm">
                                    {{$filaasigancion->ci}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm">
                                    {{$filaasigancion->placa_id}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm">
                                    {{$filaasigancion->tipo_conductor_chofer}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    <img class="img-avatar img-avatar48"
                                         src="{{asset('imagenes_store/asignaciones/'./*$filaasigancion->ci."_".$filaasigancion->placa_id."_".*/$filaasigancion->archivo_memorandum)}}"
                                         alt="">
                                </td>

                                <td class="text-center">
                                    <div class="row text-sm-center">
                                        <div class="col-sm-1 text-center">
                                            <a href="{{route('asignacion.show',$filaasigancion->asignacion_id)}}"
                                               class="btn btn-sm btn-light push mb-md-0"
                                               data-toggle="tooltip"
                                               title="VER INFORMACION COMPLETA">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="{{route('asignacion.edit',$filaasigancion->asignacion_id)}}"
                                               class="btn btn-sm btn-light push mb-md-0"
                                               data-toggle="tooltip"
                                               title="EDITAR">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="{{route('devolucion.asignacion',$filaasigancion->asignacion_id)}}"
                                               class="btn btn-sm btn-light push mb-md-0"
                                               data-toggle="tooltip"
                                               title="REALIZAR DEVOLUCION">
                                                <i class="fas fa-cut"></i>
                                            </a>
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
    </div>

@endsection

@section('js_script_import')
    {{-- ################ START SCRIPTS PARA DATATABLESS ###############--}}
    @include('components.links_css_js.datatable.datatable_js')
    {{--######################## END SCRIPT DATABLE ####################--}}

    {{-- ################ START CONFIRMAR ELIMINACION FORM ###############--}}
    @include('components.confirmation.confirmationdelete_js')
    {{-- ################# END CONFIRMAR ELIMINACION FORM ###############--}}
@endsection

