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
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-navbar/>
        <div class="bg-gray-100">
            <div class="relative bg-white overflow-hidden">
                <div class="max-w-7xl mx-auto">
                    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                        <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                        <!--
                        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                        <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                            <a class='navbar-brand' href="/">
                                <span class="sr-only">Italian PSQ</span>
                                <img src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg">
                                <span class="text-maincolor">PSQ</span>
                            </a>
                            <div class="-mr-2 flex items-center md:hidden">
                                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" id="main-menu" aria-haspopup="true">
                                <span class="sr-only">Open main menu</span>
                                <-- Heroicon name: menu --
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                </button>
                            </div>
                            </div>
                        </div>
                        <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                            <a href="{{route('users')}}" class="no-hover font-medium">Users</a>

                            <a href="{{route('surveys')}}" class="no-hover font-medium">Survey</a>

                            <a href="{{route('login')}}" class="no-hover font-medium text-maincolor">Log in</a>
                        </div>
                        </nav>-->
                        
                    </div>

                    <!--
                        Mobile menu, show/hide based on menu open state.

                        Entering: "duration-150 ease-out"
                        From: "opacity-0 scale-95"
                        To: "opacity-100 scale-100"
                        Leaving: "duration-100 ease-in"
                        From: "opacity-100 scale-100"
                        To: "opacity-0 scale-95"
                    -->
                    
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Compila il nostro</span>
                            <span class="block text-indigo-600 xl:inline">questionario online</span>
                        </h1>
                        <p class="mt-5 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Pediatric Sleep Questionnaire
                        </p>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Versione italiana validata (Cozza et al, 2015).
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                            <a href="/login" class="no-hover w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Inizia
                            </a>
                            </div>
                        </div>
                        </div>
                    </main>
                    
                    </div>
                </div>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://cdn.cdnparenting.com/articles/2018/01/384867484-H.jpg" alt="">
                </div>
            </div>
        </div>
        <footer class="footer fixed-bottom row pt-3">
            <div class="container col-12">
                <p class="text-center"> Pediatric Sleep Questionnaire | Versione italiana validata (Cozza et al, 2015)</p>
            </div>
        </footer>
    </body>
</html>