<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Fonte do Goole -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- Css Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Script js -->
    <script src="/js/scripts.js"></script>

    <!-- Vite processamento do css -->
    @vite(['resources/css/app.css'])
    @if(isset($css) && !empty($css))
        @vite('resources/css/pages/'. $css . '.css')
    @endif

    <!-- Adicione as seguintes linhas -->
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6-beta.2/css/inputmask.min.css">--}}

    {{--    <!-- Css aplication -->--}}
    {{--    <link rel="stylesheet" href="/css/app.css">--}}

    {{--    <!-- Script js -->--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
<header>
    @auth
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/dashboard" class="navbar-brand">
{{--                    <img src="/img/fundo_car.jpg" alt="HDC ">--}}
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cars.index') }}" class="nav-link">Carros</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    @endauth
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
        </div>
    </div>
</main>
<footer>
    <p>Car &copy; 2023</p>
</footer>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

@stack('scripts')
</body>
</html>
