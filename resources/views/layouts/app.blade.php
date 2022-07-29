<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- includes the Braintree JS client SDK -->
<script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>

<!-- includes jQuery -->
<script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        function valthis() {
            let checkBoxes = document.getElementsByClassName('btn-check');
            let password = document.getElementById('password').value;
            let passwordConfirm = document.getElementById('password-confirm').value;
            let isChecked = false;

            for (let i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    isChecked = true;
                    break; //don't need to continue the loop once a checkbox was found
                }
            }

            if (!isChecked) {
                document.getElementById("errors_type").innerHTML = "Seleziona almeno una categoria";

                return false;
            }

            if(password != passwordConfirm) {
                document.getElementById('errors_password').innerHTML = 'Le password devono essere uguali';
                
                return false
            }

            return true;
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;1,800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light sticky-top bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Deliveboo
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right border-0" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    Dashboard Admin
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        
            @yield('content')
        
    </div>
    
</body>

</html>