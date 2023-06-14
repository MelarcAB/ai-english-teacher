@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 ">

        <h1 class="text-3xl font-bold mb-6 text-teal-600">Configuración</h1>

        <div class=" bg-white p-6 rounded-md shadow-lg">
            <div class="mb-4">
                <h2 class="text-xl font-bold text-teal-800">Información del usuario</h2>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-teal-700">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" readonly
                    class="border rounded px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-teal-700">Correo electrónico:</label>
                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" readonly
                    class="border rounded px-3 py-2 w-full">
            </div>

            <form action="{{ route('configuration.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="openai_model" class="block text-teal-700">Modelo de OpenAI:</label>
                    <select name="openai_model" id="openai_model" class="border rounded px-3 py-2 w-full">
                        <option value="gpt-3.5-turbo-16k-0613" @if (auth()->user()->openai_model == 'gpt-3.5-turbo-16k-0613') selected @endif>GPT 3.5
                            Turbo
                            (-precisión, +velocidad, +barato)</option>

                        <option value="gpt-4-0613" @if (auth()->user()->openai_model == 'gpt-4-0613') selected @endif>GPT 4 (+precisión,
                            -velocidad, +caro)</option>
                    </select>
                    @error('openai_model')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-4">
                    <label for="openai_token" class="block text-teal-700">Token de OpenAI:</label>
                    <input type="text" name="openai_token" id="openai_token" value="{{ auth()->user()->openai_token }}"
                        class="border rounded px-3 py-2 w-full">
                    @error('openai_token')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <div class=" m-2 p-4 bg-gray-100 rounded-md shadow-md text-sm">
                        <ol class="list-decimal list-inside">
                            <li>Inicia sesión en tu cuenta de OpenAI. <a class="text-teal-600 hover:text-teal-700"
                                    target="_blank" href="https://beta.openai.com/">Accede desde
                                    aquí</a></li>
                            <li>Accede a la sección de API Keys.</li>
                            <li>Crea y copia tu token de la API de OpenAI.</li>
                            <li>Pega el token en el campo.</li>
                        </ol>
                    </div>
                </div>


                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">Guardar token</button>
                </div>
            </form>
        </div>
    </div>
@endsection
