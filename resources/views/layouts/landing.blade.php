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

<body class="bg-gradient-to-br from-teal-200 to-teal-400 min-h-screen font-poppins">
    <header class="bg-teal-500 text-white py-4 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold italic">ExaminAI</h1>
        </div>
    </header>
    <main>
        <section class="py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center md:space-x-8">
                    <img src="{{ asset('img/examinai_logo_teal.png') }}" alt="Imagen descriptiva"
                        class="w-full md:w-1/3 rounded-lg mb-3">
                    <div class="text-center md:text-left md:w-1/2">
                        <h2 class="text-3xl font-bold mb-4 text-teal-800">Exámenes personalizados de inglés</h2>
                        <p class="mb-4 text-teal-700">Nuestra aplicación web utiliza inteligencia artificial para
                            generar exámenes y
                            pruebas de inglés de manera rápida y eficiente, adaptándose a tus necesidades y nivel.</p>
                        <div class="flex flex-col md:flex-row md:justify-start space-y-4 md:space-y-0 md:space-x-4">
                            <a href="{{ route('auth.register.show') }}"
                                class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">Regístrate
                                ahora</a>
                            <a href="{{ route('auth.login.show') }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Inicia
                                sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-teal-100 py-12">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-6 text-teal-800">Características principales</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-robot text-5xl mb-4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Inteligencia Artificial</h3>
                        <p class="text-teal-700">Genera exámenes con preguntas de alta calidad y realismo utilizando
                            algoritmos avanzados de
                            inteligencia artificial.</p>
                    </div>
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-layer-group text-5xl mb-4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Personalización</h3>
                        <p class="text-teal-700">Crea exámenes ajustados a tus necesidades y nivel de conocimiento para
                            obtener una
                            experiencia de aprendizaje única.</p>
                    </div>
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-mobile-alt text-5xl mb-4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Responsive</h3>
                        <p class="text-teal-700">Utiliza nuestra aplicación desde cualquier dispositivo, ya sea móvil,
                            tablet o computadora,
                            gracias a su diseño adaptable.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>






<footer class="bg-teal-500 text-white py-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center md:justify-between space-y-4 md:space-y-0">
            <p class="text-center md:text-left">© 2023 Generador de Exámenes de Inglés con IA. Todos los derechos
                reservados.</p>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="/acerca" class="hover:text-teal-300">Acerca de</a></li>
                    <li><a href="/contacto" class="hover:text-teal-300">Contacto</a></li>
                    <li><a href="/privacidad" class="hover:text-teal-300">Política de privacidad</a></li>
                </ul>
            </nav>
        </div>
    </div>
</footer>
<script src="https://kit.fontawesome.com/tu-codigo.js" crossorigin="anonymous"></script>

</body>


</html>
