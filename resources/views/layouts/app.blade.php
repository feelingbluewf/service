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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- jQuery 3.0. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- Jquery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @if(Auth::check())
                <div class="col text-center grey">
                    <a href="{{ route('carfix.details.index') }}">Details</a>
                </div>
                <div class="col text-center grey">
                    <a href="{{ route('carfix.points.index') }}">Service Points</a>
                </div>
                <div class="col text-center grey">
                    <a href="{{ route('carfix.requests.index') }}">Requests</a>
                </div>
                <div class="col text-center grey">
                    <a href="{{ route('carfix.calendar.index') }}">Calendar</a>
                </div>
                <div class="col text-center grey">
                    <a href="#">Reports</a>
                </div>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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

                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt" style="font-size: 16px; color: #000;"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    @if(count($errors))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <li>
                            {{ session('error') }}
                        </li>
                    </div>
                    @endif
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        <li>
                            {{ session('success') }}
                        </li>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @yield('content')
    </main>

</div>
</body>
</html>

<script>
  $('nav div.container div.col a').each(function() {
    var pathname = window.location.pathname;
    var path =  pathname.split('/')[1];
    var location = window.location.protocol + '//' + window.location.host + '/' + path;
    var link = $(this).attr('href');
    console.log(link);
    if (link === location) {
      $(this).parent().addClass('active');
  }
}); 
</script>
