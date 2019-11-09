@extends('layouts.layoutmaster')
@section('title')
    FUNCIONARIOS
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
        @slot('titulo1','Tabla Funcionarios')
        <li class="breadcrumb-item">SECCION 2</li>
        <li class="breadcrumb-item">FUNCIONARIOS</li>
        <li class="breadcrumb-item">Informacion</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Tabla Funcionarios</a>
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
        <div class="block-content block-content-full block invisible shadow rounded" data-toggle="appear"
             data-class="animated bounceIn">
            <div>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">CI</th>
                        <th class="d-none d-sm-table-cell">IMAGEN</th>
                        <th class="d-none d-sm-table-cell">EXP</th>
                        <th class="d-none d-sm-table-cell">APELLIDOS</th>
                        <th class="d-none d-sm-table-cell">NOMBRES</th>
                        <th class="d-none d-sm-table-cell">CATEGORIA LICENCIA</th>
                        <th class="d-none d-sm-table-cell">NUMERO LICENCIA</th>
                        <th class="d-none d-sm-table-cell">FECHA VENCE LICENCIA</th>
                        <th class="d-none d-sm-table-cell">ESTADO</th>
                        <th style="width:10%" class="text-sm-center font-size-sm">
                            <a href="{{route('funcionario.create')}}"
                               class="btn-sm btn-primary shadow rounded">
                                <i class="fa fa-plus-circle"></i> Añadir
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datosfuncionario as $filafuncionario)
                        <tr>
                            <td class="text-center font-size-sm">
                                {{$filafuncionario->ci}}
                            </td>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48"
                                     src="{{asset('imagenes_store/funcionarios/'.$filafuncionario->ci."/".$filafuncionario->imagen_perfil)}}"
                                     alt="">
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filafuncionario->ci_exped_en}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filafuncionario->apellidos}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filafuncionario->nombres}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filafuncionario->categoria_licencia}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filafuncionario->numero_licencia}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$filafuncionario->fecha_vencimiento_licencia}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                @if($filafuncionario->estado_func_descripcion == "ACTIVO")
                                    <div class="d-none d-sm-table-cell">
                                        <span
                                            class="badge badge-success ">{{$filafuncionario->estado_func_descripcion}}
                                        </span>
                                    </div>
                                @else
                                    <div class="d-none d-sm-table-cell">
                                        <span
                                            class="badge badge-danger ">{{$filafuncionario->estado_func_descripcion}}
                                        </span>
                                    </div>
                                @endif
                            </td>

                            <td class="justify-content-center">
                                <div class="row text-sm-center">
                                    <div class="col-sm-1">
                                        <a href="{{route('funcionario.show',$filafuncionario->ci)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="VER INFORMACION COMPLETA">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="{{route('funcionario.edit',$filafuncionario->ci)}}"
                                           class="btn btn-sm btn-light push mb-md-0"
                                           data-toggle="tooltip"
                                           title="EDITAR">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                        <form
                                            action="{{route('funcionario.destroy',$filafuncionario->ci)}}"
                                            method="post" onsubmit="return confirmation()">
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

    <script type="text/javascript">
        function confirmation() {
            if (confirm("Esta seguro de eliminar?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

