<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Page CS DIRECTO PARA SHOW VEHICULO -->
{{--<meta name="description" content="Maestro sistema parque automotor gamea">
<meta name="author" content="pixelcave">
<meta name="robots" content="noindex, nofollow">--}}
<!-- Open Graph Meta -->
{{--<meta property="og:title" content="Panel administrativo">
<meta property="og:site_name" content="AdministradorAdminUI">
<meta property="og:description" content="Pantilla Maestra AdminitradorRomanUI">
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:image" content="">--}}
<!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
{{--<link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
<link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-192x192.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">--}}
<!-- END Icons -->

    <!-- Stylesheets -->
    @yield('styles')  {{--#############################   ESTO DEBE ESTAR AQUI, SI NO NO SE APLICA LOS CSS A TODAS LAS PAGINAS #########################--}}
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
    <!-- Fonts and OneUI framework -->
    {{--<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">--}}
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.css')}}">
    {{--####################### ESTILOS PARA LLENAR ###############################--}}
</head>
<body>
{{--<div class="titulo-master">ALGUNO DE LOS CODIGOS COMO ESTO ESTARÁN EN TODO LADO (MASTER)</div>--}}
<div id="page-container"
     class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed{{-- side-trans-enabled sidebar-mini--}}{{--sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed--}}">
{{--                         class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed page-header-dark"--}}
{{--TRES RAYITAS  DE LA CABECERA ->  ESTA A LA ESQUINA DERECHA PUNTA--}}
{{-- @component('componentes.1SideOverlay(lineasderarriba)')
     @include('componentes.1_A_SideHeader')
     @include('componentes.1_B_SideContent')
     HOLA MUNDO
 @endcomponent--}}
{{--SIDE BAR PARA LAS OPCIONES DE PAGINAS en Izquierda--}}
@component('components.sidebar.sidebar')
    @include('components.sidebar.sidebarheader')
    @include('components.sidebar.sidebarcontent')
@endcomponent
{{--CABECERA -> ESTA SEARCH, NAME USER, LOGOUT  lo que esta Arriba--}}
@include('components.header.headerbar')
<!-- Main Container -->
    <main id="main-container">
    {{--Hero Cuadro de bienvenida para administrador dashboard--}}
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    @component('components.Hero.hero_normal')
    @endcomponent
    {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    @yield('hero_cuadro_bienvenida') {{--@include('componentes.4_A_Hero(cuadradobienvenidaadmin)')--}}
    <!-- Page Content -->
        <div class="content {{--content-narrow--}}">
            {{--tablas, ordenes registradas
                @include('componentes.4_B_3_TablasOrdenes')
                Stats, Cuatro tarjetas informacion resumida
                @include('componentes.4_B_1_Stats(cuatrotarjetasinforesumen)')
                charts, informacin resumida
                @include('componentes.4_B_2_DashboardCharts(graficosinforesumen)')--}}
            {{-- @include('componentes.4_B_ContenidoPrincipalPagina')--}}
            @yield('content')
            @yield('js_scripts_specif')
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    {{--footer--}}
    @component('components.footer.footer')
        @yield('footer')
        <div class="d-none" id="mensaje_layuot">{{Request::url()}}</div>
        {{--<div id="mensaje_layuot_red"></div> <a id="comer" href="Amor/amor/">BONITA</a>
                                            <a href="Amor/amor/">MO</a>
        <a class="nav-main-link" href="{{route('departamento.index')}}">
            <span class="nav-main-link-name">Tabla Departamentos</span>
        </a>--}}
    @endcomponent
    {{--Apps Modal--}}
    {{--@include('componentes.6AppModal(ventanafoltante)')--}}
</div>
<!-- END Page Container -->
<script src="{{asset('assets/js/oneui.core.min.js')}}"></script>
<script src="{{asset('assets/js/oneui.app.min.js')}}"></script>
<!-- Page JS Plugins -->
<script src="{{asset('assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script> {{--############ DASHBOARD ##########--}}
<!-- Page JS Code -->
{{--<script src="{{asset('assets/js/pages/be_pages_dashboard.min.js')}}"></script>--}} {{--############ DASHBOARD ##########--}}

@yield('js_script_import')

<!-- DIALOGOS -->
<script src="{{asset('assets/js/plugins/es6-promise/es6-promise.auto.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Page JS Code -->
<script src="{{asset('assets/js/pages/be_comp_dialogs.min.js')}}"></script>

<script>

    var APP_URL = {!! json_encode(url('/')) !!};
    /*var links = $( 'a[href*="#"]' );*/
    var a = $('#mensaje_layuot').text();
    /*$('#mensaje_layuot_red').text( a );*/

    var links = $("#sidebar_all a[href='" + a + "']");
    links.addClass("active");
    var padre = links.parent();
    var padredepadre = padre.parent();
    var padrepadrepadre = padredepadre.parent();
    padrepadrepadre.addClass('open');
    var padrepadrepadrepadre = padrepadrepadre.parent();
    var padrepadrepadrepadrepadre = padrepadrepadrepadre.parent();
    padrepadrepadrepadrepadre.addClass('open');


    /* $$$$$$$$$$$$$$###########$$$$$$$$$$$$$$###########*/
    /*$(document).ready(function () {
        One.loader('show');
        $('.show').fadeOut(function () {
            One.loader('hide');
        });
    });*/
    /* $$$$$$$$$$$$$$###########$$$$$$$$$$$$$$###########*/
    /*$('a').click(function () {
        var clase = $(this).attr('href');
        $(this).addClass(' bg-black-50');
        alert(clase);
    });*/
    /* $$$$$$$$$$$$$$###########$$$$$$$$$$$$$$###########*/

    /*$(window).load(function () {
        $(".loader").fadeOut("slow");
    });*/
    /*var links = $("#sidebar_all a[href*='"+a+"']" );
    links.addClass("active");
    var padre = links.parent();
    var padredepadre=padre.parent();
    var padrepadrepadre = padredepadre.parent();
    padrepadrepadre.addClass('open');
    var padrepadrepadrepadre = padrepadrepadre.parent();
    var padrepadrepadrepadrepadre = padrepadrepadrepadre.parent();
    padrepadrepadrepadrepadre.addClass('open');*/


    /*###############################################################*/
    /*var links = $( 'a[href*='+a+']' );*/
    /*var links = $( "a[href*='Amor/amor/']" );
    links.addClass("d-none");*/
    /*$('#mensaje_layuot_red').text(" "+links.text());*/
    /*###############################################################*/


    /*var elemento = document.querySelector("a[href*='Amor/amor/']");*/
    /*elemento.addClass('d-none');*/

    /*var text = $('#comer').text();*/
    /*alert(elemento);
    var links = $( 'a[href*='+a+']' );*/
    /*var comer = $('#comer').attr('href');*/
    /*var comer = $('#comer').attr('href');*/
    /*alert(comer);*/
    /*var links = $( 'a[href*='+a+']' );
    var href = links.attr('href');
    alert(href);*/

</script>
</body>
</html>
