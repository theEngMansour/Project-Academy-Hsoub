<!DOCTYPE html>
<html 
        @if (Config::get('languages')[App::getLocale()]=="English")
            dir="ltr"
        @else 
            dir="rtl"
        @endif
        lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @livewireStyles
        <style>
            @font-face
            {
                font-family: cairo-Regular;
                src: url({{ asset('fonts/Cairo-Regular.ttf') }})
            }
            *
            {
                font-family: cairo-Regular;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation') 
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
        @yield('script')
    </body>
</html>
