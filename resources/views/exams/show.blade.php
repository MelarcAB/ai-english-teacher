@extends('layouts.app')
@section('title')
@endsection
@section('content')
    <div class="container mx-auto p-2">
        <a href="{{ route('exam.list') }}"
            class="
    
    bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Volver al listado
        </a>
    </div>


    <div class="container mx-auto px-4 py-5">
        <div class="bg-white p-5 rounded shadow-lg w-full lg:w-3/4 mx-auto">
            <h1 class="text-2xl font-bold mb-5">Examen - Nivel {{ $exam->level }}</h1>

            <form action="" method="POST">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                <div class="mb-5">
                    <h2 class="text-xl font-semibold mb-3">Lectura</h2>
                    <p class="mb-3">{{ $exam->reading }}</p>
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="reading_question_{{ $i }}">{{ $exam['reading_question_' . $i] }}</label>
                            <input type="text" name="reading_question_{{ $i }}"
                                id="reading_question_{{ $i }}"
                                class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                        </div>
                    @endfor
                </div>

                <div class="mb-5">
                    <h2 class="text-xl font-semibold mb-3">Gramática</h2>
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="grammar_question_{{ $i }}">{{ $exam['grammar_question_' . $i] }}</label>
                            <input type="text" name="grammar_question_{{ $i }}"
                                id="grammar_question_{{ $i }}"
                                class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                        </div>
                    @endfor
                </div>

                <div class="mb-5">
                    <h2 class="text-xl font-semibold mb-3">Escucha</h2>
                    <p>{{ $exam->listening }}</p>
                </div>

                <div class="mb-5">
                    <h2 class="text-xl font-semibold mb-3">Escritura</h2>
                    <p>{{ $exam->writing }}</p>
                </div>

                <div class="mb-5">
                    <h2 class="text-xl font-semibold mb-3">Habla</h2>
                    <p>{{ $exam->speaking }}</p>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg focus:outline-none hover:bg-indigo-600">Enviar
                        respuestas</button>
                </div </form>
        </div>
    </div>
@endsection
