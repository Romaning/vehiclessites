@extends('layouts.layoutmaster')
@section('title')
    INCIDENCIAS
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
        @slot('titulo1','Tabla Incidencias')
        <li class="breadcrumb-item">SECCION 3</li>
        <li class="breadcrumb-item">INCIDENCIAS</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Incidencias</a>
        </li>
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}

@section('hero_cuadro_bienvenida')

@endsection
@section('content')
    @csrf
    @include('components.alerts.alerttre')
    <div class="block">
        <div class="block-content block-content-full block invisible shadow rounded" data-toggle="appear"
             data-class="animated bounceIn">
            <div>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">ID</th>
                        <th class="d-none d-sm-table-cell">PLACA</th>
                        <th class="d-none d-sm-table-cell">CI</th>
                        <th class="d-none d-sm-table-cell">TIPO INCIDENCIA</th>
                        <th class="d-none d-sm-table-cell">FECHA INCIDENCIA</th>
                        <th class="d-none d-sm-table-cell">EN MOVIMIENTO</th>
                        <th class="d-none d-sm-table-cell">LUGAR DE INCIDENCIA</th>
                        <th class="d-none d-sm-table-cell">DESCRIPCION</th>
                        <th style="width:10%" class="text-sm-center font-size-sm">
                            <a href="{{route('incidencia.create')}}"
                               class="btn-sm btn-primary shadow rounded">
                                <i class="fa fa-plus-circle"></i> Añadir
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($incidencias as $filaincidencia)
                        <tr>
                            <td class="text-center font-size-sm">
                                {{$filaincidencia->incidencia_id}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filaincidencia->placa_id}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filaincidencia->ci}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filaincidencia->tipo_incidencia_descripcion}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filaincidencia->fecha_incidencia}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filaincidencia->vehiculo_en_movimiento}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filaincidencia->lugar_incidencia}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filaincidencia->descripcion}}
                            </td>
                            <td class="justify-content-center">
                                <div class="row text-sm-center">
                                    <div class="col-sm-1">
                                        <a href="{{route('incidencia.show',$filaincidencia->incidencia_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="VER INFORMACION COMPLETA">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="{{route('incidencia.edit',$filaincidencia->incidencia_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="EDITAR">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <form
                                            action="{{route('incidencia.destroy',$filaincidencia->incidencia_id)}}"
                                            @include('components.confirmation.confirmdel')
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

    {{-- ################ START CONFIRMAR ELIMINACION FORM ###############--}}
    @include('components.confirmation.confirmationdelete_js')
    {{-- ################# END CONFIRMAR ELIMINACION FORM ###############--}}

@endsection

