<!-- Side Navigation -->
<div class="content-side content-side-full" id="sidebar_all">
    <ul class="nav-main">
        @include('components.sidebar.parts.dashboard')
        {{--##############  @/ ###############--}}
        {{--############## /@  ###############--}}
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
               aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-control-play"></i>
                <span class="nav-main-link-name">SECCION 1</span>
            </a>
            <ul class="nav-main-submenu">
                {{--############### @/ ###############--}}
                <li class="nav-main-heading">DEPARTAMENTOS</li>
                @include('components.sidebar.parts.departamentos')
                <li class="nav-main-heading">Independientes</li>
                @include('components.sidebar.parts.independientesvehiculo')
                <li class="nav-main-heading">Independientes</li>
                @include('components.sidebar.parts.independientesfuncionario')
                {{--############## /@ ###############--}}
            </ul>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
               aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-control-play"></i>
                <span class="nav-main-link-name">SECCION 2</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-heading">Vehiculos</li>
                @include('components.sidebar.parts.vehiculomodule')
                <li class="nav-main-heading">Funcionarios</li>
                @include('components.sidebar.parts.funcionariomodulo')
                <li class="nav-main-heading">Documentos de Propiedad</li>
                @include('components.sidebar.parts.documentospropiedad')
                <li class="nav-main-heading">Imagenes de Perfil</li>
                @include('components.sidebar.parts.imagenesperfil')
                <li class="nav-main-heading">Documentos Por Periodo</li>
                @include('components.sidebar.parts.gestionSoatBsisaInspeccionVehi')
                <li class="nav-main-heading">Seguros</li>
                @include('components.sidebar.parts.seguros')
            </ul>
        </li>
        <li class="nav-main-item open">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
               aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-control-play"></i>
                <span class="nav-main-link-name">SECCION 3</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-heading">Asiganciones</li>
                @include('components.sidebar.parts.asignaciones')
                <li class="nav-main-heading">Devoluciones</li>
                @include('components.sidebar.parts.devoluciones')
                <li class="nav-main-heading">Mantenimientos</li>
                @include('components.sidebar.parts.mantenimientos')
                <li class="nav-main-heading">Vales de Combustible</li>
                @include('components.sidebar.parts.valesdecombustible')
                <li class="nav-main-heading">Infracciones</li>
                @include('components.sidebar.parts.infracciones')
                <li class="nav-main-heading">Incidencias</li>
                @include('components.sidebar.parts.incidencias')
            </ul>
        </li>
    </ul>
</div>
<!-- END Side Navigation -->
