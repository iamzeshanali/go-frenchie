<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


    <!-- Fonts -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://fernileaboardingkennels.co.uk/wp-content/uploads/2020/07/iconfinder_Kennel_3775247.png" alt="Logo not found" height="40px">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{  request()->routeIs('') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{  request()->routeIs('showStuds') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('showStuds') }}">STUDS</a>
                        </li>
                        <li class="nav-item {{  request()->routeIs('showPuppies') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('showPuppies') }}">PUPPIES</a>
                        </li>
                        <li class="nav-item {{  request()->routeIs('showLitters') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('showLitters')}}">LITTERS</a>
                        </li>
                        <li class="nav-item {{  request()->routeIs('resources') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('resources')}}">RESOURCES</a>
                        </li>
                        <li class="nav-item {{  request()->routeIs('dnaMachine') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('dnaMachine')}}">DNA MACHINE</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        <li class="nav-item">
                            <div class="h-support">
                                <a href="#"><i class="far fa-question-circle"></i></a>
                            </div>
                        </li>

                        @if (Route::has('login'))
                        <li class="nav-item">
                            <div class="h-login">
                                <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-fbd"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                            </div>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <div class="h-register">
                                <a href="{{ route('selecttype') }}" type="button" class="btn btn-primary btn-fbd"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                            </div>
                        </li>
                        @endif
                        @else
                            <!-- <li class="nav-item">
                                <div class="notification-icon"><a href=""><i class="far fa-bell"></i></a></div>
                            </li> -->
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(empty(Auth::user()->profileImage))
                                        <img class="float-left" src="images/user.png" alt="" width="30px" height="30px">
                                    @else
                                        <img class="float-left" src="{{asset_file_url(Auth::user()->profileImage)}}" alt="" width="30px" height="30px">
                                    @endif
                                </a>
                                <div class="breeder-db-login-dropdown dropdown-menu p-3" aria-labelledby="navbarDropdown">
                                    <p>
                                        <a class="dropdown-item" href="{{ route('profile') }}"><b>{{ ucfirst(Auth::user()->username) }}</b></a></p>
                                    <p><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></p>
                                    <p><a href=""><i class="fas fa-heart"></i> Liked Items</a></p>
                                    <p><a href=""><i class="fas fa-cog"></i> Settings</a></p>

                                    <hr>
                                    <p>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                        </a>
                                    </p>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->username }}--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
        @include('./components/footer')
    </div>
    <script type="text/javascript">

    </script>
</body>

</html>