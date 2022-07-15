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
                            <!-- Collegamento a Comics  -->
                            <li class="nav-item">
                                <a class="nav-link" href="">Comics</a>
                                    <!-- Nuovo link per le series -->
                                    <ul class="flex-column">
                                        <li class="nav-item"><a class="nav-link" href="">Series</a></li>
                                    </ul>
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
        

        <!-- #7 - Incollo il file js -->
        <script src="{{asset('js/admin.js')}}"></script>
        @yield('script-footer')
    </div>
</body>
</html>
