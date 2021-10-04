<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/images/favicon.png" type="image/png" sizes="150x92">



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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

    <body>
        <div id="app">
        {{--Nav bar--}}
            <header>
{{--                Secondary Navbar--}}
                <div class="secondary-nav px-4 d-flex align-items-center justify-content-end flex-wrap">
                    <a class="mr-4" href="mailto:someone@example.com" title="Email"><i class="mr-2 far fa-envelope"></i>contact@gofrenchee.com</a>
                    <a class="mr-4" href="tel:331234567" title="Phone"><i class="mr-2 fas fa-phone-alt"></i> +33 123 4567</a>
                    <a href="#"><i class="d-none d-sm-block far fa-question-circle"></i></a>
                </div>
{{--                Primary Navbar--}}
                <nav class="gf-nav navbar navbar-expand-lg navbar-light px-0">
                    <div class="container-fluid flex-nowrap" style="max-height:70px;">

                        {{--Site Logo--}}
                        <a class="navbar-brand mr-0" href="{{ url('/') }}">
                            <img src="/images/GoFrenchie-logo.png" alt="Logo not found" width="144" height="115"> {{--Logo image--}}
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        </a>

                        <div class="col d-flex justify-content-end">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <i class="fas fa-bars"></i>
                            </button>

                            <div class="collapse navbar-collapse d-none d-lg-block" id="navbarSupportedContent" style="z-index:1">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav flex-grow-1 justify-content-center">
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
                            </div>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav flex-row justify-content-right justify-content-lg-end">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item border-0">
                                            <div class="h-login">
                                                <a href="{{ route('login') }}" class="gf-btn-dark"><i class="fas fa-sign-in-alt"></i> {{ __('LOGIN') }}</a>
                                            </div>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <div class="h-register">
                                                <a href="{{ route('selecttype') }}" class="gf-btn-light"><i class="fas fa-user-plus"></i> {{ __('REGISTER') }}</a>
                                            </div>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <img class="" src="{{ Auth::user()->profileImage ? asset_file_url(Auth::user()->profileImage) : '/images/user.png'}}" alt="" width="40px" height="40px">
                                            <span>{{ ucfirst(Auth::user()->firstName) }}</span>
                                        </a>
                                        <div class="breeder-db-login-dropdown dropdown-menu p-3" aria-labelledby="navbarDropdown">

                                                <div>
                                                    <a class="d-flex align-items-center" href="{{ Auth::user()->role->getValue() == 'breeder' ? route('breederProfile') : route('customerProfile') }}">
                                                        <img class="" src="{{ Auth::user()->profileImage ? asset_file_url(Auth::user()->profileImage) : '/images/user.png'}}" alt="" width="60px" height="60px">
                                                        <div class="ml-3">
                                                            <div class="gf-dark"><b>{{ ucfirst(Auth::user()->firstName) }} {{ ucfirst(Auth::user()->lastName) }}</b></div>
                                                            <span class="gf-gray">See profile</span>
                                                        </div>
                                                    </a>
                                                </div>

                                            <hr>
                                            <p><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></p>
                                            <p><a href="{{ route('breedersetting') }}"><i class="fas fa-cog"></i>Account Settings</a></p>
                                            <p><a href=""><i class="fas fa-heart"></i> Liked Items</a></p>
                                            <p>
                                                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                                </a>
                                            </p>
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

                <div class="gf-smallScreen-menu-dropdown d-block d-lg-none position-absolute w-100">
                    <div class="collapse navbar-collapse " id="navbarSupportedContent" style="z-index:1">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav flex-grow-1 justify-content-center">
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
                    </div>
                </div>

            </header>


            <main class="">
                <!-- Loader Modal -->
                <div class="modal fade" id="loaderModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background: transparent;border: none;">
                    <div class="modal-body" style="text-align: center;">
                        <img src="/images/GoFrenchie-logo.png" alt="Logo not found" height="80px">
                    </div>
                    </div>
                </div>
                </div>
                @yield('content')
            </main>
            @include('./components/footer')
        </div>
    </body>
</html>
