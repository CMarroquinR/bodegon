<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c741fbfe23.js" crossorigin="anonymous"></script>

    <style>
        html, body {
            font-family: 'Nunito', sans-serif;
            background-image: url({{ asset('img/darkness.png') }});
            background-repeat: repeat;
        }

        .app-name {
            font-family: 'Alfa Slab One', cursive;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .full-height {
            height: 100vh;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="card border-dark">
                    <div class="card-body">
                        <div class="h1"><i class="fas fa-store-alt"></i> <span class="app-name align-self-center">BODEGON</span></div>
                        <div class="h5 pb-4 text-secondary font-weight-bold">Encuentra tu bodega más cercana y haz tu pedido sin salir de casa</div> <!-- Encuentra tu bodega más cercana y haz tu pedido ya! -->
                        <div class="pb-2">
                            <a href="{{ route('login') }}" class="btn btn-danger btn-block">Iniciar sesión</a>
                        </div>
                        <div>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

