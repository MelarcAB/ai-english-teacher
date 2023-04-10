<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ExaminAI | Generador y Corrector de Exámenes de Inglés con Inteligencia Artificial ChatGPT</title>
    <meta name="description"
        content="ExaminAI es una innovadora aplicación web desarrollada por MelarcAB que utiliza la inteligencia artificial de ChatGPT de OpenAI para generar y corregir exámenes de inglés de manera eficiente. Gestiona tus exámenes, mejora tus habilidades en inglés y realiza pruebas en línea con nuestra avanzada IA. Desarrollado por MelarcAB.">

    <!-- Open Graph -->
    <meta property="og:title"
        content="ExaminAI | Generador y Corrector de Exámenes de Inglés con Inteligencia Artificial ChatGPT">
    <meta property="og:description"
        content="ExaminAI es una innovadora aplicación web que utiliza la inteligencia artificial de ChatGPT de OpenAI para generar y corregir exámenes de inglés de manera eficiente. Gestiona tus exámenes, mejora tus habilidades en inglés y realiza pruebas en línea con nuestra avanzada IA.">
    <meta property="og:image" content="{{ asset('img/examinai_og_image.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="ExaminAI | Generador y Corrector de Exámenes de Inglés con Inteligencia Artificial ChatGPT">
    <meta name="twitter:description"
        content="ExaminAI es una innovadora aplicación web que utiliza la inteligencia artificial de ChatGPT de OpenAI para generar y corregir exámenes de inglés de manera eficiente. Gestiona tus exámenes, mejora tus habilidades en inglés y realiza pruebas en línea con nuestra avanzada IA. Desarrollado por MelarcAB.">
    <meta name="twitter:image" content="{{ asset('img/examinai_twitter_card.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    <!-- img -->
    <link rel="icon" href="{{ asset('img/examinai_logo_teal.png') }}" type="image/png" sizes="16x16">
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
            <h1 class="text-3xl font-bold italic">ExaminAI: Práctica y aprendizaje de inglés con IA</h1>
        </div>
    </header>
    <main>
        <section class="py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center md:space-x-8">
                    <img src="{{ asset('img/examinai_logo_teal.png') }}" alt="Logo ExaminAI"
                        class="w-full md:w-1/3 rounded-lg mb-3 hover:shadow-glow">
                    <div class="text-center md:text-left md:w-1/2">
                        <h2 class="text-3xl font-bold mb-4 text-teal-800">Exámenes personalizados de inglés con
                            tecnología ChatGPT</h2>
                        <p class="mb-4 text-teal-700">ExaminAI es una aplicación web única que utiliza la inteligencia
                            artificial de ChatGPT de OpenAI para generar y corregir exámenes de inglés. Nuestra
                            plataforma es perfecta para estudiantes y profesionales que desean mejorar sus habilidades
                            en el idioma de manera eficiente y personalizada.</p>
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
                <h2 class="text-3xl font-bold text-center mb-6 text-teal-800">Características principales de ExaminAI
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-robot text-5xl mb-4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Inteligencia Artificial Avanzada</h3>
                        <p class="text-teal-700">ExaminAI genera exámenes con preguntas de alta calidad y realismo
                            utilizando algoritmos avanzados de inteligencia artificial de ChatGPT. Obtén resultados
                            precisos y confiables para evaluar tus habilidades en inglés.</p>
                    </div>
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-layer-group text-5xl mb-4 4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Personalización y niveles variados</h3>
                        <p class="text-teal-700">Crea exámenes ajustados a tus necesidades y nivel de conocimiento,
                            desde A1 hasta C2, para obtener una experiencia de aprendizaje única. Practica y mejora en
                            las áreas específicas del inglés que necesitas.</p>
                    </div>
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-mobile-alt text-5xl mb-4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Diseño adaptable y fácil de usar</h3>
                        <p class="text-teal-700">Utiliza nuestra aplicación desde cualquier dispositivo, ya sea móvil,
                            tablet o computadora, gracias a su diseño adaptable. Navega fácilmente y disfruta de una
                            experiencia de usuario excepcional en ExaminAI.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-teal-200 py-12">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-6 text-teal-800">¿Por qué elegir ExaminAI?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-check-double text-5xl mb-4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Corrección precisa</h3>
                        <p class="text-teal-700">ExaminAI corrige tus exámenes de inglés de manera eficiente
                            mediante el uso de las colas de Laravel. Obtén resultados precisos y feedback valioso para
                            mejorar tus habilidades en el idioma.</p>
                    </div>
                    <div class="text-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl  transition-all">
                        <i class="fas fa-user-shield text-5xl mb-4 text-teal-800"></i>
                        <h3 class="text-xl font-bold mb-2 text-teal-800">Seguridad y privacidad</h3>
                        <p class="text-teal-700">ExaminAI protege los datos de sus usuarios al requerir que configuren
                            su propio token de acceso de OpenAI. Garantizamos la seguridad y la privacidad de tu
                            información mientras utilizas nuestra plataforma.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>



<footer class="bg-teal-500 text-white py-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center space-y-4">
            <p class="text-center">© {{ now()->year }} Desarrollado por MelarcAB. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>


<script src="https://kit.fontawesome.com/tu-codigo.js" crossorigin="anonymous"></script>

</body>


</html>
