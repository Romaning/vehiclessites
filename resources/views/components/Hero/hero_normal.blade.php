

<div class="bg-image @yield('css_hero')" style="background-image: url( @yield('imagen_fondo',asset('image_proyect/fondo_hero5.jpg')));/* height: 10%;*/">
    {{--<div class="row" style="height: 10px;"></div>--}}
    <div class="bg-black-50 @yield('div_hero_css','')" {{--style="height: 10%"--}}>
        <div class="content content-full @yield('div_content_css','text-center')">
            <div class="my-0 @yield('div_imagen_avatar_css','')">
                <img class="img-avatar {{--img-avatar-thumb--}} @yield('imagen_avatar_css','')"
                     src="@yield('imagen_avatar','')" alt="" id="src_imagen_perfil_hero">
            </div>
            <h1 class="h2 text-white mb-0 @yield('texto_en_h1_css','')" id="name_perfil_hero"> @yield('texto_en_h1','') </h1>
            <span class="text-white-75"> @yield('nombre_miniatura','') </span>
        </div>
        @yield('nuevo_contenido_hero')
    </div>
    {{--<div class="row" style="height: 10px;"></div>--}}
</div>
{{--{{$slot}}--}}
<!-- END Hero -->
@yield('New_Hero')
