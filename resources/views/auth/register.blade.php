<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>REGISTRO</title>

    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.min.css')}}">

</head>
<body>

<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="w-100">
                <!-- Sign Up Section -->
                <div class="content content-full bg-white">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="mb-2">
                                    <a class="btn-block-option" href="{{route('webpage')}}" data-toggle="tooltip"
                                       data-placement="left" title="Pagina Principal">
                                        <img src="{{asset('image_proyect/laravel.png')}}" alt="" width="30%">
                                    </a>
                                </p>
                                <h1 class="h4  mb-1">
                                    CREAR CUENTA
                                </h1>
                                <h2 class="h6 font-w400 text-muted mb-3">
                                    <a class="btn-block-option" href="{{route('login')}}" data-toggle="tooltip"
                                       data-placement="left" title="Sign In">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                </h2>
                            </div>
                            <!-- END Header -->

                            <!-- Sign Up Form -->
                            <form method="POST" action="{{ route('register') }}" class="js-validation-signup"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="py-3">
                                    {{-- ################## USERNAME #################--}}
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror form-control form-control-lg form-control-alt"
                                                       value="{{ old('name') }}"
                                                       name="name"
                                                       autocomplete="name"
                                                       placeholder="Usuario"
                                                       required
                                                       autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ################## EMAIL #################--}}
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <i class="fa fa-mail-bulk"></i>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror form-control form-control-lg form-control-alt"
                                                       name="email"
                                                       value="{{ old('email') }}"
                                                       required
                                                       placeholder="Correo"
                                                       autocomplete="Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ################## PASSWORD #################--}}
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input id="password"
                                                       type="password"
                                                       class="form-control @error('password') is-invalid @enderror form-control form-control-lg form-control-alt"
                                                       name="password"
                                                       required
                                                       autocomplete="new-password"
                                                       placeholder="Contraseña">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ################## CONFIRM PASSWORD #################--}}
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <i class="fa fa-lock-open"></i>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input id="password-confirm"
                                                       type="password"
                                                       class="form-control form-control-lg form-control-alt"
                                                       name="password_confirmation"
                                                       required
                                                       autocomplete="new-password"
                                                       placeholder="Confirmar Contraseña">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-block btn-success">
                                            <i class="fa fa-fw fa-plus mr-1"></i> Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                </div>
                <!-- END Sign Up Section -->

                <!-- Footer -->
                <div class="font-size-sm text-center text-muted py-3">
                </div>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<script src="{{asset('assets/js/oneui.core.min.js')}}"></script>
<script src="{{asset('assets/js/oneui.app.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/pages/op_auth_signup.min.js')}}"></script>
</body>
</html>
