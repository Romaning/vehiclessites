@extends('layouts.layoutmaster')
@section('title')
ESTADOS
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
        @slot('titulo1','Tabla Estados')
        <li class="breadcrumb-item">SECCION 1</li>
        <li class="breadcrumb-item">INDEPENDIENTES</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Estados</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('hero_cuadro_bienvenida')

@endsection

@section('content')
    @include('components.alerts.alerttre')
    @csrf
    <!-- Dynamic Table with Export Buttons -->
    <div class="block">
        {{--<div class="block-header">
            <h3 class="block-title">Tabla Dinamica<small>  Boton exportar</small></h3>
        </div>--}}
        <div class="block-content block-content-full shadow rounded">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <tr>
                    <th class="text-center" style="width: 1%;">ID</th>
                    <th>Estado</th>
                    <th class="d-none d-sm-table-cell" style="width: 19%;">Creado</th>
                    <th class="d-none d-sm-table-cell" style="width: 19%;">Actualizado</th>
                    <th style="width:10%;" class="text-sm-center font-size-sm">
                        <a href="{{route('estado.create')}}"
                           class="btn-sm btn-primary shadow rounded">
                            <i class="fa fa-plus-circle"></i> Añadir
                        </a>
                    </th>
                    {{-- <th style="width: 15%;">Botones</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($datosestado as $filaestado)
                    <tr>
                        <td class="text-center font-size-sm">
                            {{$filaestado->est_id}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$filaestado->est_descripcion}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$filaestado->created_at}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$filaestado->updated_at}}
                        </td>
                        <td class="d-none d-sm-table-cell text-right">
                            <div class="row text-center">
                                <div class="col-sm-1">
                                    <a href="{{route('estado.show',$filaestado->est_id)}}"
                                       class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                       title="VER INFORMACION COMPLETA">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1">
                                    <a href="{{route('estado.edit',$filaestado->est_id)}}"
                                       class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
                                       title="EDITAR">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1">
                                    <form action="{{route('estado.destroy',$filaestado->est_id)}}"
                                          @include('components.confirmation.confirmdel')
                                          method="post">
                                        @csrf
                                        @method('delete')
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
    <!-- END Dynamic Table with Export Buttons -->
@endsection
@section('js_script_import')
    {{-- ################ START SCRIPTS PARA DATATABLESS ###############--}}
    @include('components.links_css_js.datatable.datatable_js')
    {{--######################## END SCRIPT DATABLE ####################--}}

    {{-- ################ START CONFIRMAR ELIMINACION FORM ###############--}}
    @include('components.confirmation.confirmationdelete_js')
    {{-- ################# END CONFIRMAR ELIMINACION FORM ###############--}}
@endsection

