@extends('layouts.layoutmaster')
@section('title')
    CLASES
@endsection
@section('styles')
    {{-- ################ START SCRIPTS PARA DATATABLESS ###############--}}
    @include('components.links_css_js.datatable.datatable_css')
    {{--######################## END SCRIPT DATABLE ####################--}}
@endsection

{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Tabla Clases')
        <li class="breadcrumb-item">SECCION 1</li>
        <li class="breadcrumb-item">INDEPENDIENTES</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">CLASES</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}

@section('hero_cuadro_bienvenida')

@endsection
@section('content')

    @include('components.alerts.alerttre')

    <div class="block">
        {{--<div class="block-header">
            <h3 class="block-title">Tabla Dinamica<small>  Boton exportar</small></h3>
        </div>--}}
        <div class="block-content block-content-full block invisible shadow rounded" data-toggle="appear"
             data-class="animated bounceIn{{--bounceIn--}}">
        {{--<button class="dt-button buttons-print" tabindex="0" aria-controls="example" type="button"><span>Print</span></button>--}}
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <tr>
                    <th class="d-none d-sm-table-cell" style="width: 1%;">ID</th>
                    {{--<th>Nombre Clase</th>--}}
                    <th class="d-none d-sm-table-cell">Nombre Clase</th>
                    <th class="d-none d-sm-table-cell" style="width: 19%;">Creado</th>
                    <th class="d-none d-sm-table-cell" style="width: 19%;">Actualizado</th>
                    <th style="width:10%;" class="text-sm-center font-size-sm">
                        <a href="{{route('clase.create')}}"
                           class="btn-sm btn-primary shadow rounded">
                            <i class="fa fa-plus-circle"></i> Añadir
                        </a>
                    </th>
                    {{-- <th style="width: 15%;">Botones</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($datosclase as $filaclase)
                    <tr>
                        <td class="text-center font-size-sm">
                            {{$filaclase->clase_id}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$filaclase->clase_descripcion}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$filaclase->created_at}}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{$filaclase->updated_at}}
                        </td>
                        <td class="text-sm-center font-size-sm">
                            <div class="row text-sm-center font-size-sm">
                                <div class="col-sm-1">
                                    <a href="{{route('clase.show',$filaclase->clase_id)}}" class="btn btn-sm btn-light push mb-md-0"
                                       data-toggle="tooltip"
                                       title="VER INFORMACION COMPLETA">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1">
                                    <a href="{{route('clase.edit',$filaclase->clase_id)}}" class="btn btn-sm btn-light push mb-md-0"
                                       data-toggle="tooltip"
                                       title="EDITAR">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1">
                                    <form action="{{route('clase.destroy',$filaclase->clase_id)}}"
                                          method="post" @include('components.confirmation.confirmdel')>
                                        @csrf
                                        @method('delete')
                                        <button href="" type="submit" class="btn btn-sm btn-light push mb-md-0" data-toggle="tooltip"
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


