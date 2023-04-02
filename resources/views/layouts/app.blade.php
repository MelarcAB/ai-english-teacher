<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IA Examinador Inglés</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

    @stack('styles')
</head>

<body class="bg-gradient-to-b from-teal-50 to-teal-200 font-poppins min-h-screen flex flex-col">
    <header class="bg-teal-600 shadow-sm">
        <div class="container mx-auto px-4 py-5 flex items-center justify-between">
            <a href="/" class="text-3xl font-black text-teal-100 font-extralight flex-shrink-0">
                <i class="fa-solid fa-robot"></i> IA Examinador Inglés
            </a>
            @auth
                <div class="hidden md:flex md:items-center md:space-x-4">
                    <a href="/configuracion"
                        class="text-teal-100  uppercase rounded-lg transition-colors hover:bg-teal-700 px-5 py-2 text-lg">
                        <i class="fa-solid fa-user "></i> {{ Auth::user()->username }}</a>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-white hover:bg-red-500 px-5 py-2 transition-colors bg-red-400 rounded-lg">
                            Salir <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            @endauth
            <button id="menu-toggle" class="md:hidden text-teal-100 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden w-full bg-teal-200 shadow-md p-4 transition-all duration-200">
            @auth
                <a href="/configuracion" class="block mb-4 text-teal-800 hover:text-teal-600 uppercase">
                    <i class="fa-solid fa-user"></i> {{ Auth::user()->username }}</a>
                </a>
            @endauth
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="block text-teal-800 hover:text-teal-600">
                    Salir <i class="fa fa-sign-out" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </header>



    <main class="container mx-auto mt-3">
        <h2 class="font-black text-center text-3xl mb-3">@yield('title')</h2>
        @yield('content')
    </main>


    <!--
    <footer class="mt-10 text-center p-5 text-gray-500 font-bold">
        <i class="fa fa-copyright" aria-hidden="true"></i>
        IA Examinador Inglés - MelarcAB
        @php
            //{{ date('Y') }}
        @endphp
        {{ now()->year }}
    </footer>
-->

</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>

</html>
