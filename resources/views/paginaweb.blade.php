<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAGINA WEB</title>
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.min.css')}}">
    <style>
        header{
            /*background: linear-gradient(150deg, #110083, #f10004, #010129);*/
            background: linear-gradient(150deg, #000629, #03000c, #1b1a29);
            background-size: 400% 300%;
            animation: BgGradient 5s ease infinite;
            height: 100vh;
            position: relative;
            /*overflow: hidden;*/
        }
        @keyframes BgGradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        header:after{
            content: "";
            position: absolute;
            bottom: 0;
            width: 100%;
            background-image: url({{asset('image_proyect/wave-bottom.svg')}});
            height: 275px;
        }

        .header-content{
            z-index: 1;
            position: relative;
        }
        .header-content h1{
            font-size: 45px;
            font-weight: bold;
            text-transform: capitalize;
            color: white;
        }
        .header-content p{
            font-size: 20px;
            margin:20px 0 25px;
            color: white;
            letter-spacing: 1px;
            font-weight: 300;
            text-transform: capitalize;
        }
        .theme-btn{
            border-radius: 50px;
            background: white;
            padding: 15px 30px;
            min-width: 170px;
            border: 2px solid white;
            color: black;
            font-size: 14px;
            text-transform: uppercase;
            margin-top: 13px;
            display: inline-block;
            text-align: center;
        }

    </style>
</head>
<body>

<header>
    <div class="container">
        <div class="header-content">
            <div class="row">
                <div class="col-lg-6">
                    <div style="margin-top: 130px;"></div>
                    <img src="{{asset('image_proyect/laravel_red.png')}}" class="img-responsive" alt="" width="400" height="400">
                </div>
                <div class="col-lg-6">
                    <div style="margin-top: 230px;"></div>
                    <h1>INGRESAR AL SISTEMA</h1>
                    <P>
                        
                    </P>
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth {{--VER SI ESTÁ AUTHENTICADO--}}
                            <a href="{{ url('/tablero') }}" class="theme-btn">Home</a>
                            @else {{--EN EL CASO DE NO ESTAR AUTHENTICADO--}}
                            <a href="{{ route('login') }}" class="theme-btn">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="theme-btn">Register</a>
                            @endif
                            @endauth
                        </div>
                    @endif
                    {{--<a href="" class="theme-btn">Read More</a>
                    <a href="" class="theme-btn">Start Now</a>--}}
                    <div class="bg-about"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<script src="{{asset('assets/js/oneui.core.min.js')}}"></script>
<script src="{{asset('assets/js/oneui.app.min.js')}}"></script>
</body>
</html>
