<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LOGIN</title>
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.css')}}">
    <style>
        body, html, .content {
            margin: 0 !important;
            padding: 0 !important;
            /*overflow-y: hidden;
            overflow-x: hidden;*/
        }
        .mydiv {
            /*position: absolute;*/
            /*width: 100%;
            height: 100%;
            display: flex;*/
            justify-content: center;
            align-items: center;
            /*font-size: 45px;*/
            font-weight: bold;
            /*background: linear-gradient(150deg, #fff102,  #f10271, #00c298);*/
            background: linear-gradient(150deg, #3e4a59, #181b22, #232a3a);
            background-size: 400% 300%;
            animation: BgGradient 5s ease infinite;
        }

        @keyframes BgGradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

    </style>
</head>
<body>
<div id="page-container" style="margin: 0;">
    <main id="main-container" style="margin: 0;">
        <div class="content {{--content-narrow--}}">

            <div class="row">
                <div class="col-lg-4 btn-primary mydiv">
                    {{--<div class="mydiv"></div>--}}
                </div>
                <div class="col-lg-8">

                    <div class="hero-static d-flex align-items-center">
                        <div class="content content-full bg-white">

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <!-- Header -->
                                    <div class="text-center">
                                        <p class="mb-2">
                                            <a class="btn-block-option" href="{{route('webpage')}}"
                                               data-toggle="tooltip"
                                               data-placement="left" title="Pagina Principal">
                                                <img src="{{asset('image_proyect/laravel.png')}}" alt="" width="30%">
                                            </a>
                                        </p>
                                        <h1 class="h1 mb-1">
                                            INGRESAR
                                            <a class="btn-block-option" href="{{route('register')}}" style="float: right;"
                                               data-toggle="tooltip" data-placement="left" title="Nueva Cuenta">
                                                <i class="fa fa-user-plus h4"></i>
                                            </a>
                                        </h1>
                                        <h2 class="h6 font-w400 text-muted mb-3">
                                            {{--<a class="btn-block-option" href="{{route('register')}}"
                                               data-toggle="tooltip" data-placement="left" title="Nueva Cuenta">
                                                <i class="fa fa-user-plus"></i>
                                            </a>--}}
                                        </h2>
                                    </div>
                                    <!-- END Header -->

                                    <!-- Sign In Form -->
                                    <form method="POST" action="{{ route('login') }}" class="js-validation-signin">
                                        @csrf
                                        <div class="py-3">
                                            {{-- &&&&&&&&&&&&&&&&&&& CORREO $$$$$$$$$$$$$$$$$$--}}
                                            <div class="row">
                                                <div class="col-sm-1 text-center">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <input id="email" type="email"
                                                               class="form-control {{--form-control-alt form-control-lg--}} @error('email') is-invalid @enderror"
                                                               name="email"
                                                               value="{{ old('email') }}"
                                                               required
                                                               placeholder="Correo"
                                                               {{--autocomplete="email"--}}
                                                               autofocus>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- &&&&&&&&&&&&&&&&&&& PASSSWORD $$$$$$$$$$$$$$$$$$--}}
                                            <div class="row">
                                                <div class="col-sm-1 text-center">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <input id="password"
                                                               type="password"
                                                               class="form-control {{--form-control-alt form-control-lg --}} @error('password') is-invalid @enderror"
                                                               name="password"
                                                               placeholder="Contraseña"
                                                               required {{--autocomplete="current-password"--}}>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--&&&&&&&&&&&&&&&&&&&&&&&&& &&&&&&&&&&&&&&&&&&&&--}}
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="login-remember"
                                                           name="login-remember">
                                                    <label class="custom-control-label font-w400"
                                                           for="login-remember">Recordar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-block bg-primary-dark text-white">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1 text-white"></i> Ingresar
                                                </button>
                                                {{--@if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif--}}
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                            {{--<div class="font-size-sm text-center text-muted py-3">
                                <a href="" class="btn btn-info" onclick="verAdminPassword()"><i class="fa fa-hand-paper"></i></a>
                            </div>--}}
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </main>

    {{--@component('components.footer.footer')
        @yield('footer')
    @endcomponent--}}
</div>
<script src="{{asset('assets/js/oneui.core.min.js')}}"></script>
<script src="{{asset('assets/js/oneui.app.min.js')}}"></script>
<script
    src="{{asset('assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script> {{--############ DASHBOARD ##########--}}
<script src="{{asset('assets/js/plugins/es6-promise/es6-promise.auto.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/be_comp_dialogs.min.js')}}"></script>
<script>
    function verAdminPassword() {
        alert('correo : admin@admin.com \n contraseña: administrador');
    }
</script>
</body>
</html>
