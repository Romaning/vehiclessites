@extends('layouts.layoutmaster')
@section('title')
    INFORMACION ESTADO
@endsection
@section('styles')

@endsection
{{--################### MODIFICACION HERO #################--}}
@section('div_content_css','d-none')
@section('nuevo_contenido_hero')
    @component('components.Hero.herotexto')
        @slot('titulo1','Informacion Estado')
        {{--<li class="breadcrumb-item">SECCION 1</li>
        <li class="breadcrumb-item">INDEPENDIENTES</li>
        <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">CLASES</a>
        </li>--}}
    @endcomponent
@endsection
{{--################### MODIFICACION HERO #################--}}
@section('hero_cuadro_bienvenida')

@endsection
@section('content')
    <div class="block shadow p-2 mb-1 rounded">
        <div class="block-header">
            <h3 class="block-title"></h3>
        </div>
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">

                <div class="modal-body" style="font-weight: bold;">

                    <div class="form-group">
                        <div class="row">
                            <div class="col col-sm-2">
                                ID
                                <div class="btn-warning shadow p-2 mb-1 rounded">{{$datostipo->tipo_id}}</div>
                            </div>
                            <div class="col">
                                NOMBRE DE LA TIPO
                                <div class="btn-success shadow p-2 mb-1 rounded">{{$datostipo->tipo_descripcion}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                CREADO EL
                                <div class="btn-success shadow p-2 mb-1 rounded">{{$datostipo->created_at}}</div>
                            </div>
                            <div class="col">
                                ACTUALIZADO EL
                                <div class="btn-success shadow p-2 mb-1 rounded">{{$datostipo->created_at}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
@section('js_script_import')

@endsection

