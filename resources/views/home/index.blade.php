@extends('layouts.app')
@section('title')
@endsection
@section('content')
    <div class="container mx-auto px-4 font-poppins">
        <div class="bg-white shadow-md rounded-md p-6 mt-8">
            <h1 class="text-2xl font-bold mb-6 text-teal-700">¡Bienvenido, {{ auth()->user()->name }}!</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-b from-teal-50 to-teal-200 p-6 rounded-md">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-file-alt text-4xl text-teal-800"></i>
                        <h2 class="text-xl font-bold ml-4 text-teal-800">Tus Exámenes</h2>
                    </div>
                    <p class="mb-4 text-teal-700">Accede a tus exámenes de inglés generados y personalizados por inteligencia
                        artificial.</p>
                    <div class="flex justify-center">
                        <a href="{{ route('exam.list') }}"
                            class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">Ver exámenes</a>
                    </div>
                </div>
                <div class="bg-gradient-to-b from-teal-50 to-teal-200 p-6 rounded-md">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-pencil-alt text-4xl text-teal-800"></i>
                        <h2 class="text-xl font-bold ml-4 text-teal-800">Crear Examen</h2>
                    </div>
                    <p class="mb-4 text-teal-700">Crea un nuevo examen de inglés personalizado de acuerdo con tus
                        necesidades y nivel.</p>
                    <div class="flex justify-center">
                        <a href="{{ route('exam.create') }}"
                            class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">Crear
                            Examen</a>
                    </div>
                </div>
                <div class="bg-gradient-to-b from-teal-50 to-teal-200 p-6 rounded-md">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fa-solid fa-gear text-4xl text-teal-800"></i>
                        <h2 class="text-xl font-bold ml-4 text-teal-800">Test</h2>
                    </div>
                    <p class="mb-4 text-teal-700">Testos</p>
                    <div class="flex justify-center">
                        <a href="{{ route('test') }}"
                            class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">Acceder a
                            testos</a>
                    </div>
                </div>

                @if (auth()->user()->isAdmin())
                    <div class="bg-gradient-to-b from-teal-50 to-teal-200 p-6 rounded-md">
                        <div class="flex items-center justify-center mb-4">
                            <i class="fa-solid fa-gear text-4xl text-teal-800"></i>
                            <h2 class="text-xl font-bold ml-4 text-teal-800">Logs</h2>
                        </div>
                        <p class="mb-4 text-teal-700">Logs de las peticiones con sus consumos de tokens de las generaciones.
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ route('logs') }}"
                                class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">Ver logs</a>
                        </div>
                    </div>
                @endif

            </div>


        </div>
    </div>
@endsection
