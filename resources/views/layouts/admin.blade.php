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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- #8 - Aggiorna il foglio di stile con quello clonato in precedenza -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- #1 incollo l'header dal clone app.blade -->
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Delivebool</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap px-3">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
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
                <aside class="col-3 col-sm-2 col-md-2 min-vh-100 px-0">
                    <nav class="navbar navbar-expand navbar-dark bg-dark h-100 align-items-start">
                        <ul class="nav navbar-nav flex-column">
                            <!-- Collegamento alla Dashboard -->
                            <li class="nav-item active"><a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <!-- Collegamento a products  -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.products.index')}}">
                                    Products
                                </a>
                            </li>
                            <!-- Collegamento a orders  -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.orders.index')}}">
                                    Orders
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>
                <!-- Colonna dell'admin, show ecc -->
                <!--  #2 taglio menu di navigazione e lo incollo nel partials header -->
                <main class="col-9 col-sm-10 col-md-10 py-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- #6 - Aggiungo anche il Footer. Nella schermata admin non serve -->

        @yield('script-footer')
    </div>
</body>
</html>
