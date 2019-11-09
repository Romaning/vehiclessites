{{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ HOME $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
@extends('layouts.layoutmaster')
@section('title')
    TABLERO
@endsection
@section('styles')
    {{--<!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" href="{{asset('cssromsys/style.css')}}">
    {{--
        <link rel="stylesheet" href="{{asset('cssromsys/animate.css')}}">
        <link rel="stylesheet" href="{{asset('cssromsys/style.css')}}">
        <link rel="stylesheet" href="{{asset('cssromsys/waves.css')}}">--}}
@endsection
@section('sidebar_header_perfil_usuario_css','d-none')
@section('hero_cuadro_bienvenida')
@section('css_hero','d-none')
@section('New_Hero')
    <!-- Instructors -->
    {{--<div class="bg-image" style="background-image: url({{asset('assets/media/photos/photo27@2x.jpg')}});">--}}
    <div class="bg-image" style="background-image: url({{asset('image_proyect/fondo_hero9.jpg')}});">
        <div class="bg-primary-dark-op py-1">
            <div class="content content-full content-boxed text-center">
                <h2 class="font-w400 text-white mb-2 {{--mb = margin-button--}} invisible" data-toggle="appear"
                    data-offset="50"
                    data-class="animated fadeInDown" style="font-family:'Times New Roman';">BIENVENIDO
                    ADMINISTRADOR</h2>
                <h3 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-timeout="300"
                    data-class="animated fadeInDown">{{-- $$$$$$$$$ TEXTO $$$$$$$ --}}</h3>
                <div class="row items-push mt-1"> {{--mt = margin-top --}}
                    <div class="col-md-4 invisible" data-toggle="appear" data-offset="-150" data-timeout="150"
                         data-class="animated fadeInRight">
                        {{--<img class="img-avatar img-avatar-thumb" src="{{asset('assets/media/avatars/avatar1.jpg')}}"
                             alt="">
                        <div class="font-size-lg text-white mt-1">Lisa Jenkins</div>--}}{{--###--}}{{--
                        <div class="font-size-sm text-white-50">Web Designer</div>--}}
                    </div>
                    <div class="col-md-4 invisible" data-toggle="appear" data-offset="-150"
                         data-class="animated zoomIn">
                        <img class="img-avatar img-avatar-thumb" src="{{asset('assets/media/avatars/avatar13.jpg')}}"
                             alt="">
                        <div class="font-size-lg text-white mt-1">
                            @if (Route::has('login'))
                                @auth
                                    {{ Auth::user()->name }}
                                @else
                                @endauth
                            @endif</div>{{--###--}}
                        <div class="font-size-sm text-white-50">Super Usuario</div>
                    </div>
                    <div class="col-md-4 invisible" data-toggle="appear" data-offset="-150" data-timeout="150"
                         data-class="animated fadeInLeft">
                        {{--<img class="img-avatar img-avatar-thumb" src="{{asset('assets/media/avatars/avatar3.jpg')}}"
                             alt="">
                        <div class="font-size-lg text-white mt-1">Judy Ford</div> --}}{{--###--}}{{--
                        <div class="font-size-sm text-white-50">Photographer</div>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END Instructors -->
@endsection
@endsection
@section('content')
    {{--
    array:1 [▼
      0 => {#565 ▼
        +"mes": 10
        +"numero_vehiculos": 4
      }
    ]
    --}}
    {{--
    $incidenciasAnoActual
    $anoActual
    $incidenciasAnoAnterior
    $anoAnterior

    $contValesPorPlacaMesActual
    $numeroVehiculos
    $numeroDepartamentos
    $numeroFuncionarios
    $numeroAsigancionesActiva
    $numeroVehiculosSinAsignaciones
    $numeroDeVehiculosEnServicio
    $numeroDeVehiculosFueraServicio

$numeroInfraccionesPorMes
$numeroInfraccionesPorMesAnoAnterior
$numeroBsisaPorGesion
$numeroInspeccionPorGestion
$numeroSoatPorGestionActivo
$numeroSoatVencido
    --}}
    <div class="{{--content content-boxed --}}overflow-hidden">
        <div class="row">
            <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-class="animated fadeInDown">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x shadow"
                   href="javascript:void(0)">
                    @if(empty($contValesPorPlacaMesActual)) {{-- SI NO EXISTE DATOS --}}
                    <div class="block-content block-content-full btn-warning">
                        <div class="font-size-sm font-w600 text-uppercase text-white">
                            VEHICULOS CON VALE DE COMBUSTIBLE MES {{date('M')}}
                        </div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="0"
                             data-speed="1000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                    @else
                        @foreach($contValesPorPlacaMesActual as $filacontValesPorPlacaMesActual)
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">
                                    MES {{$filacontValesPorPlacaMesActual->mes}}: VALES B
                                </div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="{{$filacontValesPorPlacaMesActual->numero_vehiculos}}"
                                     data-speed="7000"
                                     data-fresh-interval="1">X
                                </div>
                            </div>
                        @endforeach
                    @endif
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-timeout="200" data-class="animated fadeInDown">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x shadow"
                   href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">NUMERO DE VEHICULOS</div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="@if(empty($numeroVehiculos)) 0 @else {{$numeroVehiculos[0]->total_vehiculos}} @endif"
                             data-speed="7000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-timeout="400"
                 data-class="animated fadeInDown">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x shadow"
                   href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">NUMERO DE DEPARTAMENTOS</div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="{{$numeroDepartamentos[0]->numero_departamentos}}"
                             data-speed="7000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-timeout="600"
                 data-class="animated fadeInDown">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x shadow"
                   href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">NUMERO DE FUNCIONARIOS</div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="{{$numeroFuncionarios[0]->numero_funcionarios}}"
                             data-speed="7000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{--<div class="block shadow p-2 mb-1 rounded" id="" data-toggle="appear" data-class="animated bounceIn">--}}


    <div class="block shadow p-2 mb-1 rounded" id="" data-toggle="appear" data-class="animated bounceIn">
        <!-- Dashboard Charts -->
        <div class="row">
            <div class="col-lg-12">
                <div class="block block-rounded block-mode-loading-oneui">
                    <div class="block-header">
                        <h3 class="block-title">INCIDENCIAS</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-0 bg-body-light text-center">
                        <!-- Chart.js is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js) -->
                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                        <div class="pt-3" style="height: 250px;">
                            <canvas class="js-chartjs-dashboard-incidencia"></canvas>
                        </div>
                    </div>
                    <div class="block-content">

                    </div>
                </div>
            </div>
        </div>
        <!-- END Dashboard Charts -->
    </div>


    <div class="row" style="margin-top: 1%;">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-class="animated fadeInDown">
            <a class="block block-rounded block-link-pop border-left border-right border-danger border-4x shadow"
               href="javascript:void(0)">
                @if(($numeroAsigancionesActiva[0]->numero_asignaciones == 0))
                    <div class="block-content block-content-full btn-warning">
                        <div class="font-size-sm font-w600 text-uppercase text-muted text-white">VEHICULOS ASIGNADOS</div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="0" data-speed="1000"
                             data-fresh-interval="1">
                        </div>
                    </div>
                @else
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">VEHICULOS ASIGNADOS</div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="{{$numeroAsigancionesActiva[0]->numero_asignaciones}}" data-speed="1000"
                             data-fresh-interval="1">
                        </div>
                    </div>
                @endif
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-timeout="200" data-class="animated fadeInDown">
            <a class="block block-rounded block-link-pop border-left border-right border-danger border-4x shadow"
               href="javascript:void(0)">
                @if($numeroVehiculosSinAsignaciones==0)
                    @php($css = "")
                    <div class="block-content block-content-full">
                        @else
                            @php($css = "text-white")
                            <div class="block-content block-content-full btn-warning">
                                @endif
                                <div class="font-size-sm font-w600 text-uppercase text-muted {{$css}}">VEHICULOS NO
                                    ASIGNADOS
                                </div>
                                <div class="font-size-h2 font-w400 text-dark count-to "
                                     data-from="0" data-to="{{$numeroVehiculosSinAsignaciones}}" data-speed="1000"
                                     data-fresh-interval="1">
                                </div>
                            </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-timeout="400" data-class="animated fadeInDown">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x shadow"
               href="javascript:void(0)">
                @if($numeroDeVehiculosEnServicio[0]->numero_vehiculo_en_servicio==0)
                    <div class="block-content block-content-full btn-warning">
                        <div class="font-size-sm font-w600 text-uppercase text-muted text-white">VEHICULOS EN SERVICIO
                        </div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="0"
                             data-speed="1000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                @else
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">VEHICULOS EN SERVICIO</div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="{{$numeroDeVehiculosEnServicio[0]->numero_vehiculo_en_servicio}}"
                             data-speed="1000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                @endif
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3 invisible" data-toggle="appear" data-timeout="600" data-class="animated fadeInDown">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x shadow"
               href="javascript:void(0)">
                @if($numeroDeVehiculosFueraServicio==0)
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">VEHICULOS FUERA DE SERVICIO
                        </div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="0" data-speed="1000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                @else
                    <div class="block-content block-content-full btn-warning">
                        <div class="font-size-sm font-w600 text-uppercase text-muted text-white">VEHICULOS FUERA DE
                            SERVICIO
                        </div>
                        <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                             data-to="{{$numeroDeVehiculosFueraServicio}}" data-speed="1000"
                             data-fresh-interval="1">X
                        </div>
                    </div>
                @endif
            </a>
        </div>
    </div>
    <!-- END Stats -->



    {{--<div class="row">--}}
    <div class="row">
        <div class="col-lg-6">
            <!-- Bars Chart -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">INFRACCIONES </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full text-center">
                    <div class="py-1">
                        <!-- Bars Chart Container -->
                        <canvas class="js-chartjs-bars"></canvas>
                    </div>
                </div>
            </div>
            <!-- END Bars Chart -->
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12 invisible" data-toggle="appear" data-timeout="200" data-class="animated fadeInDown">
                    <a class="shadow block block-rounded block-link-pop border-left border-primary border-4x"
                       href="javascript:void(0)">
                        @if(empty($numeroBsisaPorGesion))
                            <div class="block-content block-content-full btn-warning">
                                <div class="font-size-sm font-w600 text-uppercase text-muted text-white">VEHICULOS CON
                                    BSISA
                                </div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="0"
                                     data-speed="1000" data-fresh-interval="1">X
                                </div>
                            </div>
                        @else
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted ">VEHICULOS CON BSISA</div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="{{$numeroBsisaPorGesion[0]->numero_total_bsisa}}"
                                     data-speed="1000" data-fresh-interval="1">X
                                </div>
                            </div>
                        @endif
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 invisible" data-toggle="appear" data-timeout="400" data-class="animated fadeInDown">
                    <a class="shadow block block-rounded block-link-pop border-left border-primary border-4x"
                       href="javascript:void(0)">
                        @if(empty($numeroInspeccionPorGestion))
                            <div class="block-content block-content-full btn-warning">
                                <div class="font-size-sm font-w600 text-uppercase text-muted text-white">VEHICULOS CON
                                    INSPECCION
                                    VEHICULAR
                                </div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="0" data-speed="1000"
                                     data-fresh-interval="1">X
                                </div>
                            </div>
                        @else
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">VEHICULOS CON INSPECCION
                                    VEHICULAR
                                </div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="{{$numeroInspeccionPorGestion[0]->numero_total_inspeccion}}"
                                     data-speed="1000"
                                     data-fresh-interval="1">X
                                </div>
                            </div>
                        @endif

                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-6 invisible" data-toggle="appear" data-timeout="200" data-class="animated fadeInDown">
                    <a class="shadow block block-rounded block-link-pop border-left border-primary border-4x"
                       href="javascript:void(0)">
                        @if(empty($numeroSoatPorGestionActivo))
                            <div class="block-content block-content-full btn-warning">
                                <div class="font-size-sm font-w600 text-uppercase text-muted text-white">VEHICULOS CON
                                    SOAT
                                </div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="0" data-speed="1000"
                                     data-fresh-interval="1">X
                                </div>
                            </div>
                        @else
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">VEHICULOS CON SOAT</div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="{{$numeroSoatPorGestionActivo[0]->numero_total_soat}}" data-speed="1000"
                                     data-fresh-interval="1">X
                                </div>
                            </div>
                        @endif
                    </a>
                </div>
                <div class="col-6 invisible" data-toggle="appear" data-timeout="400" data-class="animated fadeInDown">
                    <a class="shadow block block-rounded block-link-pop border-left border-primary border-4x"
                       href="javascript:void(0)">
                        @if(empty($numeroSoatVencido))
                            <div class="block-content block-content-full">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">SOAT VENCIDOS</div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="0" data-speed="1000"
                                     data-fresh-interval="1">X
                                </div>
                            </div>
                        @else
                            <div class="block-content block-content-full btn-warning">
                                <div class="font-size-sm font-w600 text-uppercase text-muted text-white">SOAT VENCIDOS
                                </div>
                                <div class="font-size-h2 font-w400 text-dark count-to" data-from="0"
                                     data-to="{{$numeroSoatVencido[0]->numero_total_soat}}" data-speed="1000"
                                     data-fresh-interval="1">X
                                </div>
                            </div>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- END Page Content -->
    {{--{{$numeroBsisaPorGesion[0]->numero_total_bsisa}}
    {{$numeroInspeccionPorGestion[0]->numero_total_inspeccion}}
    {{$numeroSoatPorGestionActivo[0]->numero_total_soat}}

    @if(empty($numeroSoatVencido))
        NO HAY SOAT VENCIDOS
    @else
        {{$numeroSoatVencido[0]->numero_total_soat}}
    @endif--}}


    {{--<div class="block shadow p-2 mb-1 rounded" id="" data-toggle="appear" data-class="animated bounceIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="block block-rounded block-mode-loading-oneui">
                    <div class="block-header">
                        <h3 class="block-title">Sales</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-0 bg-body-light text-center">
                        <div class="pt-3" style="height: 300px;">
                            <canvas class="js-chartjs-dashboard-infraccion"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>--}}

    {{--#$$$$$$$$$$$$$$$################$$$$$$$$$$$$$$$## LOADER #################$$$$$$$$$$$$$$$$$####################--}}
    <div id="page-loader" class="show"></div>
    {{--#$$$$$$$$$$$$$$$################$$$$$$$$$$$$$$$## LOADER #################$$$$$$$$$$$$$$$$$####################--}}
@endsection

@section('js_script_import')
    <script src="{{asset('jsromsys/jquery.countTo.js')}}"></script>
    <script src="{{asset('jsromsys/infobox-4.js')}}"></script>
    {{--<script src="{{asset('jsromsys/waves.js')}}"></script>--}}

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    {{--<script src="assets/js/plugins/chart.js/Chart.bundle.min.js"></script>--}}
    <!-- Page JS Code -->
    <script>
        !function (r) {
            var e = {};

            function t(a) {
                if (e[a]) return e[a].exports;
                var o = e[a] = {i: a, l: !1, exports: {}};
                return r[a].call(o.exports, o, o.exports, t), o.l = !0, o.exports
            }

            t.m = r, t.c = e, t.d = function (r, e, a) {
                t.o(r, e) || Object.defineProperty(r, e, {enumerable: !0, get: a})
            }, t.r = function (r) {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(r, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(r, "__esModule", {value: !0})
            }, t.t = function (r, e) {
                if (1 & e && (r = t(r)), 8 & e) return r;
                if (4 & e && "object" == typeof r && r && r.__esModule) return r;
                var a = Object.create(null);
                if (t.r(a), Object.defineProperty(a, "default", {
                    enumerable: !0,
                    value: r
                }), 2 & e && "string" != typeof r) for (var o in r) t.d(a, o, function (e) {
                    return r[e]
                }.bind(null, o));
                return a
            }, t.n = function (r) {
                var e = r && r.__esModule ? function () {
                    return r.default
                } : function () {
                    return r
                };
                return t.d(e, "a", e), e
            }, t.o = function (r, e) {
                return Object.prototype.hasOwnProperty.call(r, e)
            }, t.p = "", t(t.s = 2)
        }([, , function (r, e, t) {
            r.exports = t(3)
        }, function (r, e) {
            function t(r, e) {
                for (var t = 0; t < e.length; t++) {
                    var a = e[t];
                    a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(r, a.key, a)
                }
            }

            var a = function () {
                function r() {
                    !function (r, e) {
                        if (!(r instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, r)
                }

                var e, a, o;
                return e = r, o = [{
                    key: "initChartsChartJS", value: function () {
                        Chart.defaults.global.defaultFontColor = "#999", Chart.defaults.global.defaultFontStyle = "600", Chart.defaults.scale.gridLines.color = "rgba(0,0,0,.05)", Chart.defaults.scale.gridLines.zeroLineColor = "rgba(0,0,0,.1)", Chart.defaults.scale.ticks.beginAtZero = !0, Chart.defaults.global.elements.line.borderWidth = 2, Chart.defaults.global.elements.point.radius = 4, Chart.defaults.global.elements.point.hoverRadius = 6, Chart.defaults.global.tooltips.cornerRadius = 3, Chart.defaults.global.legend.labels.boxWidth = 15;
                        var r, e, t = jQuery(".js-chartjs-lines"), a = jQuery(".js-chartjs-bars"),
                            o = jQuery(".js-chartjs-radar"), n = jQuery(".js-chartjs-polar"), l = jQuery(".js-chartjs-pie"),
                            i = jQuery(".js-chartjs-donut");
                        r = {
                            labels: /*["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],*/
                                ['enero',
                                    'febrero',
                                    'marzo',
                                    'abril',
                                    'mayo',
                                    'junio',
                                    'julio',
                                    'agosto',
                                    'septiembre',
                                    'octubre',
                                    'noviembre',
                                    'diciembre'],

                            datasets: [{
                                label: "Este Año",
                                fill: !0,
                                backgroundColor: "rgba(220,220,220,.3)",
                                borderColor: "rgba(220,220,220,1)",
                                pointBackgroundColor: "rgba(220,220,220,1)",
                                pointBorderColor: "#fff",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "rgba(220,220,220,1)",
                                data: [30, 32, 40, 45, 43, 38, 55, 40, 45, 43, 38, 55]
                            }, {
                                label: "Año Anterior",
                                fill: !0,
                                backgroundColor: "rgba(171, 227, 125, .3)",
                                borderColor: "rgba(171, 227, 125, 1)",
                                pointBackgroundColor: "rgba(171, 227, 125, 1)",
                                pointBorderColor: "#fff",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "rgba(171, 227, 125, 1)",
                                data: [15, 16, 20, 25, 23, 25, 32, 40, 45, 43, 38, 55]
                            }]
                        }, e = {
                            labels: ["Earnings", "Sales", "Tickets"],
                            datasets: [{
                                data: [48, 26, 26],
                                backgroundColor: ["rgba(171, 227, 125, 1)", "rgba(250, 219, 125, 1)", "rgba(117, 176, 235, 1)"],
                                hoverBackgroundColor: ["rgba(171, 227, 125, .75)", "rgba(250, 219, 125, .75)", "rgba(117, 176, 235, .75)"]
                            }]
                        }, t.length && new Chart(t, {type: "line", data: r}), a.length && new Chart(a, {
                            type: "bar",
                            data: r
                        }), o.length && new Chart(o, {type: "radar", data: r}), n.length && new Chart(n, {
                            type: "polarArea",
                            data: e
                        }), l.length && new Chart(l, {type: "pie", data: e}), i.length && new Chart(i, {
                            type: "doughnut",
                            data: e
                        })
                    }
                }, {
                    key: "initRandomEasyPieChart", value: function () {
                        jQuery(".js-pie-randomize").on("click", function (r) {
                            jQuery(r.currentTarget).parents(".block").find(".pie-chart").each(function (r, e) {
                                return jQuery(e).data("easyPieChart").update(Math.floor(100 * Math.random() + 1))
                            })
                        })
                    }
                }, {
                    key: "init", value: function () {
                        this.initChartsChartJS(), this.initRandomEasyPieChart()
                    }
                }], (a = null) && t(e.prototype, a), o && t(e, o), r
            }();
            jQuery(function () {
                a.init()
            })
        }]);

    </script>
{{--&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&--}}
    <!-- Page JS Helpers (Easy Pie Chart + jQuery Sparkline Plugins) -->
    <script>jQuery(function () {
            One.helpers(['easy-pie-chart', 'sparkline']);
        });</script>

    <script>
        $(document).ready(function () {
            One.loader('show');
            setTimeout(function () {
                One.loader('hide');
            }, 300);
        });
    </script>

    <script>
        var meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
        /*$$$$$$$$$$$$$$$$$$$$$$$$ RECIBIR DATOS DE CONTROLADOR Y CONVERTIRLO A ARRAY $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
        var arraynumincidenciapormes = [];
        var datosincidenciasanoactual = @json($incidenciasAnoActual);
        for (var i in datosincidenciasanoactual) {
            arraynumincidenciapormes.push(datosincidenciasanoactual[i].numero_incidencias);
        }
        console.log(arraynumincidenciapormes);
        /*var enero = 4;
        var febrero = 3;
        var marzo = 6;
        var abril = 3;
        var mayo = 4;
        var junio = 4;
        var julio = 10;
        var agosto = 4;
        var septiembre = 6;
        var octubre = 4;
        var noviembre = null;
        var diciembre = null;*/
        /*$$$$$$$$$$$$$$$$$$$$$$$$ RECIBIR DATOS DE CONTROLADOR Y CONVERTIRLO A ARRAY $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
        var arraynumincidenciapormesanoanterior = [];
        var datosincidenciasanoanterior = @json($incidenciasAnoAnterior);
        for (var p in datosincidenciasanoanterior) {
            arraynumincidenciapormesanoanterior.push(datosincidenciasanoanterior[p].numero_incidencias);
        }
        console.log(arraynumincidenciapormesanoanterior);
        /*$$$$$$$$$$$$$$$$$$$$$$$$ RECIBIR DATOS DE CONTROLADOR Y CONVERTIRLO A ARRAY $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/

        !function (r) {
            var e = {};

            function o(t) {
                if (e[t]) return e[t].exports;
                var a = e[t] = {i: t, l: !1, exports: {}};
                return r[t].call(a.exports, a, a.exports, o), a.l = !0, a.exports
            }

            o.m = r, o.c = e, o.d = function (r, e, t) {
                o.o(r, e) || Object.defineProperty(r, e, {enumerable: !0, get: t})
            }, o.r = function (r) {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(r, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(r, "__esModule", {value: !0})
            }, o.t = function (r, e) {
                if (1 & e && (r = o(r)), 8 & e) return r;
                if (4 & e && "object" == typeof r && r && r.__esModule) return r;
                var t = Object.create(null);
                if (o.r(t), Object.defineProperty(t, "default", {
                    enumerable: !0,
                    value: r
                }), 2 & e && "string" != typeof r) for (var a in r) o.d(t, a, function (e) {
                    return r[e]
                }.bind(null, a));
                return t
            }, o.n = function (r) {
                var e = r && r.__esModule ? function () {
                    return r.default
                } : function () {
                    return r
                };
                return o.d(e, "a", e), e
            }, o.o = function (r, e) {
                return Object.prototype.hasOwnProperty.call(r, e)
            }, o.p = "", o(o.s = 18)
        }({
            18: function (r, e, o) {
                r.exports = o(19)
            }, 19: function (r, e) {
                function o(r, e) {
                    for (var o = 0; o < e.length; o++) {
                        var t = e[o];
                        t.enumerable = t.enumerable || !1, t.configurable = !0, "value" in t && (t.writable = !0), Object.defineProperty(r, t.key, t)
                    }
                }

                var t = function () {
                    function r() {
                        !function (r, e) {
                            if (!(r instanceof e)) throw new TypeError("Cannot call a class as a function")
                        }(this, r)
                    }

                    var e, t, a;
                    return e = r, a = [{
                        key: "initCharts", value: function () {
                            Chart.defaults.global.defaultFontColor = "#495057", Chart.defaults.scale.gridLines.color = "transparent", Chart.defaults.scale.gridLines.zeroLineColor = "transparent", Chart.defaults.scale.display = !1, Chart.defaults.scale.ticks.beginAtZero = !0, Chart.defaults.global.elements.line.borderWidth = 0, Chart.defaults.global.elements.point.radius = 0, Chart.defaults.global.elements.point.hoverRadius = 0, Chart.defaults.global.tooltips.cornerRadius = 3, Chart.defaults.global.legend.labels.boxWidth = 12;
                            var r, e, o, t, a = jQuery(".js-chartjs-dashboard-incidencia"),
                                n = jQuery(".js-chartjs-dashboard-infraccion");
                            r = {
                                maintainAspectRatio: !1,
                                scales: {yAxes: [{ticks: {suggestedMax: 12}}]},
                                tooltips: {
                                    intersect: !1, callbacks: {
                                        label: function (r, e) {
                                            return /*" $" +*/ r.yLabel
                                        }
                                    }
                                }
                            }, o = {
                                maintainAspectRatio: !1,
                                scales: {yAxes: [{ticks: {suggestedMax: 20}}]},
                                tooltips: {
                                    intersect: !1, callbacks: {
                                        label: function (r, e) {
                                            return " " + r.yLabel + " Sales"
                                        }
                                    }
                                }
                            }, e = {
                                labels: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
                                datasets: [{
                                    label: "Este Año",
                                    fill: !0,
                                    backgroundColor: "rgba(4,238,5,0.63)",
                                    borderColor: "rgba(23,232,15,0.89)"/*"transparent"*/,
                                    pointBackgroundColor: "rgb(55,207,38)",
                                    pointBorderColor: "#fff",
                                    pointHoverBackgroundColor: "#fff",
                                    pointHoverBorderColor: "rgb(67,207,95)",
                                    data: arraynumincidenciapormes, /* ###########$$$$$$$$$$$$$##########$$$$$$$$$ ARRAY DE DATOS ###########$$$$$$$$$$$$$$$$$##############$$$$$$$$$$$$$*/
                                }, {
                                    label: "Año Anterior",
                                    fill: !0,
                                    backgroundColor: "rgba(233, 236, 239, 1)",
                                    borderColor: "transparent",
                                    pointBackgroundColor: "rgba(233, 236, 239, 1)",
                                    pointBorderColor: "#fff",
                                    pointHoverBackgroundColor: "#fff",
                                    pointHoverBorderColor: "rgba(233, 236, 239, 1)",
                                    data: arraynumincidenciapormesanoanterior,
                                    /*[enero + 1, febrero + 2, marzo + 1, abril + 1, mayo + 1, junio + 1, julio + 1, agosto + 1, septiembre + 1, octubre + 1, noviembre + 1, diciembre + 1],*/
                                    /* ###########$$$$$$$$$$$$$##########$$$$$$$$$ ARRAY DE DATOS ###########$$$$$$$$$$$$$$$$$##############$$$$$$$$$$$$$*/
                                }]
                            },


                                t = {
                                    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                                    datasets: [{
                                        label: "This Year",
                                        fill: !0,
                                        backgroundColor: "rgba(132, 94, 247, .3)",
                                        borderColor: "transparent",
                                        pointBackgroundColor: "rgba(132, 94, 247, 1)",
                                        pointBorderColor: "#fff",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(132, 94, 247, 1)",
                                        data: [175, 120, 169, 82, 135, 169, 132, 130, 192, 230, 215, 260]
                                    }, {
                                        label: "Last Year",
                                        fill: !0,
                                        backgroundColor: "rgba(233, 236, 239, 1)",
                                        borderColor: "transparent",
                                        pointBackgroundColor: "rgba(233, 236, 239, 1)",
                                        pointBorderColor: "#fff",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(233, 236, 239, 1)",
                                        data: [220, 170, 110, 215, 168, 227, 154, 135, 210, 240, 145, 178]
                                    }]
                                }, a.length && new Chart(a, {
                                type: "line",
                                data: e,
                                options: r
                            }), n.length && new Chart(n, {type: "line", data: t, options: o})
                        }
                    }, {
                        key: "init", value: function () {
                            this.initCharts()
                        }
                    }], (t = null) && o(e.prototype, t), a && o(e, a), r
                }();
                jQuery(function () {
                    t.init()
                })
            }
        });

    </script>
    {{--<script src="{{asset('jsromsys/page_tablero_two.js')}}"></script>--}}


@endsection

