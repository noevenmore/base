<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title','Title undefined')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" class="flex flex-col min-h-screen bg-gray-100">
            <header>
                @include('layouts.header')
            </header>

            <main class="flex-1">
                @yield('content')
            </main>

            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>
