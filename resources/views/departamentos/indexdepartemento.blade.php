@extends('layouts.layoutmaster')
@section('title')
    DEPARTAMENTOS
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
        @slot('titulo1','Tabla Departamentos')
        <li class="breadcrumb-item">SECCION 1</li>
        <li class="breadcrumb-item">DEPARTAMENTOS</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Departamentos</a>
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
                        <th class="d-none d-sm-table-cell">NOMBRE DEPARTAMENTO</th>
                        <th class="d-none d-sm-table-cell">DEP ID</th>
                        <th class="d-none d-sm-table-cell">DEPENDENCIA</th>
                        <th class="d-none d-sm-table-cell">LIDER CI</th>
                        <th class="d-none d-sm-table-cell">NOMBRE LIDER</th>
                        <th style="width:10%" class="text-sm-center font-size-sm">
                            <a href="{{route('departamento.create')}}"
                               class="btn-sm btn-primary shadow rounded">
                                <i class="fa fa-plus-circle"></i> Añadir
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datosdepartamentos as $filadepartmento)
                        <tr>
                            <td class="text-center font-size-sm">
                                {{$filadepartmento->departamento_id}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadepartmento->departamento_name}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadepartmento->depende_id}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadepartmento->departamento_nombre}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadepartmento->jefe_id}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filadepartmento->jefe_id}}
                            </td>
                            <td class="justify-content-center">
                                <div class="row text-sm-center">
                                    <div class="col-sm-1">
                                        <a href="{{route('departamento.show',$filadepartmento->departamento_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="VER INFORMACION COMPLETA">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="{{route('departamento.edit',$filadepartmento->departamento_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="EDITAR">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <form
                                            action="{{route('departamento.destroy',$filadepartmento->departamento_id)}}"
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

