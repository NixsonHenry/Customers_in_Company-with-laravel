<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title', 'Learning Laravel 8.0')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="">
    <style>
        #menu-toggle:checked + #menu {
               display: block;
             }
    </style>
        
        <header class="flex justify-between px-10 py-2 header-color">
       
            <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
            <input class="hidden" type="checkbox" id="menu-toggle" />
                @include('layouts.navbar')
        </header>

        <div class="px-auto items-center justify-center">

           @if(session()->has('message'))
                <div class="rounded p-3 text-green-800 font-serif bg-green-100 mt-8 mx-auto max-w-3xl">
                <strong class="pl-4">Success: </strong> {{ session()->get('message') }} 
                </div>
           @endif

            @yield('content')
        </div>
</body>
</html>
