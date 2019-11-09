<!-- Side Header -->
<div class="content-header bg-white-5">


    <!-- END Close Side Overlay -->
    <!-- Logo -->
    {{--<div class="row">--}}{{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
    <a class="font-w600 text-dual" href="{{route('webpage')}}">
        {{--<i class="fa fa-circle-notch text-primary"></i>--}}
        <img src="{{asset('image_proyect/lara.png')}}" alt="" width="16%">
        {{--<i class="fa-house-damage"></i>--}}
        <span class="smini-hide text-right">
            <span class="col-lg-12"> {{--$$$$$$$$$$$$$$$$$ $$$$$$$$$$$$$$$$$--}}
                <span class="font-w700 font-size-h5">

                </span>
                <span class="font-w400" {{--style="font-size: 18px; font-family: Brush Script MT, Brush Script Std, cursive;"--}}>
                    ROM-SYS
                </span>
            </span> {{--$$$$$$$$$$$$$$$$$ $$$$$$$$$$$$$$$$$--}}
        </span>
    </a>
{{--</div>--}} {{--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$--}}
<!-- Close Sidebar, Visible only on mobile screens -->
    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
    <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
        <i class="fa fa-times"></i>
    </a>
    <!-- END Close Sidebar -->
</div>
<div id="sidebar_header_perfil_usuario"
     class="bg-image @yield('sidebar_header_perfil_usuario_css')">
    {{--style="background-image: url( @yield('background_avatar_sidebar',asset('image_proyect/fondo_hero3.jpg')));"--}}
    <div class="bg-black-50">
        <div class="content content-full text-center">
            <div class="my-1">
                <img class="img-avatar img-avatar-thumb"
                     src="@yield('imagen_avatar_sidebar','')" alt="" id="src_imagen_perfil_sidebar">
            </div>
            <h1 class="h2 text-white mb-0" id="name_perfil_sidebar">
                @yield('texto_en_avatar_sidebar','')
            </h1>
            <span class="text-white-75"> @yield('texto_miniatura_sidebar','')
                @if (Route::has('login'))
                    @auth
                        {{ Auth::user()->name }}
                    @else
                    @endauth
                @endif
            </span>
        </div>
    </div>
</div>

