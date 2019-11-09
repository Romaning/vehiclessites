@extends('layouts.layoutmaster')
@section('title')
    MANTENIMIENTOS
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
        <li class="breadcrumb-item">MANTENIMIENTOS</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Mantenimientos</a>
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

    @csrf
    <div class="block">
        <div class="block-content block-content-full block invisible shadow rounded" data-toggle="appear"
             data-class="animated bounceIn">
            <div>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>
                        {{--<th class="d-none d-sm-table-cell">ID</th>--}}
                        <th class="d-none d-sm-table-cell">MI ID</th>
                        <th class="d-none d-sm-table-cell">FECHA INCIO MANT</th>
                        <th class="d-none d-sm-table-cell">PLACA</th>
                        <th class="d-none d-sm-table-cell">DEATALLE MANT</th>
                        <th class="d-none d-sm-table-cell">TIPO MANT</th>
                        <th class="d-none d-sm-table-cell">EMPRESA ENCARGADA</th>
                        <th class="d-none d-sm-table-cell">MANT FIN</th>
                        <th style="width:10%" class="text-sm-center font-size-sm">
                            <a href="{{route('mantenimiento.create')}}"
                               class="btn-sm btn-primary shadow rounded">
                                <i class="fa fa-plus-circle"></i> Añadir
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datosmants as $filamant)
                        <tr>
                            {{--<td class="text-center font-size-sm">
                                {{$filamant->mantenimiento_id}}
                            </td>--}}
                            <td class="text-center">
                                {{$filamant->mant_id_ini_asign}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filamant->fecha_inicio_mant}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filamant->placa_id_mant}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filamant->detalle_mant}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filamant->tipo_mant}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filamant->empresa_encargada_mant}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                @if(empty($filamant->mant_id_fin_asign))
                                    <div class="col-sm-1">
                                        <a href="{{route('mantenimiento.edit',$filamant->mantenimiento_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="FINALIZAR MANTENIMIENTO">
                                            <i class="fas fa-stop"></i>
                                        </a>
                                    </div>
                                    @else
                                    {{$filamant->fecha_fin_mant}}
                                @endif
                                {{--<a href="">
                                    <img class="img-avatar img-avatar48"
                                         src=""
                                         alt="">
                                </a>--}}
                            </td>
                            <td class="justify-content-center">
                                <div class="row text-sm-center">
                                    <div class="col-sm-1">
                                        <a href="{{route('mantenimiento.show',$filamant->mantenimiento_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="VER INFORMACION COMPLETA">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="{{route('mantenimiento.edit',$filamant->mantenimiento_id)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="EDITAR">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <form
                                            action="{{route('mantenimiento.destroy',$filamant->mantenimiento_id)}}"
                                            onclick="confirmation()"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button href="" type="submit" class="btn btn-sm btn-light push mb-md-0"
                                                    @include('components.confirmation.confirmdel')
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

