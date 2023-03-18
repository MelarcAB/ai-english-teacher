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

    @stack('styles')
</head>

<body class="bg-teal-100">
    <header class="p-5  bg-teal-300 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl  font-black text-teal-800 font-extralight">
                <i class="fa-solid fa-robot"></i> IA Examinador Inglés
            </h1>

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

</html>
