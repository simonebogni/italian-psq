<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @yield('styles')
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        
        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="container main-container mb-5 mt-5">
            @yield('main-content')
        </div>
        <footer class="footer fixed-bottom row pt-3">
            <div class="container col-12">
                <p class="text-center"> Pediatric Sleep Questionnaire | Versione italiana validata (Cozza et al, 2015)</p>
            </div>
        </footer>
        @yield('scripts')
    </body>
</html>
