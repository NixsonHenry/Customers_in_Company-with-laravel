<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Learning Laravel 8.0') }}</title> --}}

    <title>@yield('title', 'Learning Laravel 8.0')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">

    <style>
        #menu-toggle:checked + #menu {
               display: block;
             }
    </style>

    <div class="" id="app">
        <header class="flex justify-between px-16 py-2 header-color font-serif ">
            <div class="container mx-auto flex justify-between items-center ">

                <div class="">
                    @include('layouts.navbar')
                </div>

                <nav class="space-x-4 text-white text-sm sm:text-base pr-24">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                    {{-- {{ route('logout') }} --}}

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>

            </div>
        </header>


        @if(session()->has('message'))
            <div class="rounded p-3 text-green-800 font-serif bg-green-100 mt-8 mx-auto max-w-3xl">
            <strong class="pl-4">Success: </strong> {{ session()->get('message') }} 
            </div>
        @endif

        @yield('content')
    </div>


</body>
</html>
