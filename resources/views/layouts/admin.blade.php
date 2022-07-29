<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;1,800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- #8 - Aggiorna il foglio di stile con quello clonato in precedenza -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <header class="navbar py-1 sticky-top bg-dark align-items-center flex-md-nowrap p-0">
            <!-- Parte SX navbar -->
            <a class="navbar-brand nav-logo col-md-3 col-lg-2 me-0 px-3 d-sm-none d-md-inline" href="/">
                <img src="{{asset('img/deliveboo_logo.jpg')}}" alt="Logo Deliveboo">
            </a>
            <div>
                <button class="navbar-toggler border-0 d-sm-inline d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- Parte DX navbar -->
            <div class="navbar-nav h-100 ">
                <div class="nav-item text-nowrap px-3 d-flex align-items-center">
                    <!-- Immagine utente -->
                    <div class="user d-flex align-items-center">
                        <img class="user_avatar  me-2" src="{{asset('img/avatar_5.jpg')}}" alt="Immagine utente">
                        <span>Ciao {{ucfirst(Auth::user()->name)}}</span>
                    </div>
                    <!-- Link al Logout -->
                    <a class="nav-link btn create_button text-black-50 mx-3 me-2 px-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <!-- Token sicurezza -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <!-- /.container-fluid -->
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <!-- Aside laterale -->
                <aside class="col-2 col-sm-2 col-md-2 min-vh-100 px-0 collapse multi-collapse d-md-inline" id="sidebarMenu">
                    <nav class="navbar pt-0 navbar-expand navbar-dark bg-dark h-100 align-items-start">
                        <!-- Lista di link laterali -->
                        <ul class="nav w-100 navbar-nav flex-column">
                            <!-- Collegamento alla home -->
                            <li class="nav-item w-100 pt-0 "><a class="nav-link w-100" href="/">Home</a></li>
                            <!-- Collegamento alla Dashboard -->
                            <li class="nav-item active"><a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <!-- Collegamento a products  -->
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.products.index')}}">Products</a></li>
                            <!-- Collegamento a orders  -->
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.orders.index')}}">Orders</a></li>
                        </ul>
                    </nav>
                </aside>
                <!-- Colonna dell'admin, show ecc -->
                <!--  #2 taglio menu di navigazione e lo incollo nel partials header -->
                <main class="col-10 col-sm-10 col-md-10 py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
