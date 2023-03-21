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
            <h1 class="text-3xl font-bold mb-5">Examen - Nivel {{ $exam->level }}</h1>

            <form action="{{ route('exam.store') }}" method="POST">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                <div class="mb-5">
                    <h2 class="text-2xl font-semibold mb-3">1. Reading</h2>
                    <h3 class="text-xl font-semibold mb-3">1.1. Lee el texto y responde las preguntas.</h3>
                    <p class="mb-3">{{ $exam->reading }}</p>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_answer_1">{{ $exam['reading_question_1'] }}</label>
                        <input type="text" name="reading_answer_1" id="reading_answer_1"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                            value="{{ $exam_answers->reading_answer_1 }}">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_answer_2">{{ $exam['reading_question_2'] }}</label>
                        <input type="text" name="reading_answer_2" id="reading_answer_2"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                            value="{{ $exam_answers->reading_answer_2 }}">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_answer_3">{{ $exam['reading_question_3'] }}</label>
                        <input type="text" name="reading_answer_3" id="reading_answer_3"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                            value="{{ $exam_answers->reading_answer_3 }}">
                    </div>
                    <h3 class="text-xl font-semibold mb-5 mt-5">1.2. Lee el texto y responde si las frases son verdaderas o
                        falsas.</h3>

                </div>

                <div class="mb-5 mt-10">
                    <h2 class="text-2xl font-semibold mb-3">2. Gramática</h2>
                    <h3 class="text-xl font-semibold mb-3">2.1. Selecciona la opción correcta.</h3>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="grammar_answer_1">{{ $exam['grammar_question_1'] }}</label>
                        <input type="text" name="grammar_answer_1" id="grammar_answer_1"
                            value="{{ $exam_answers->grammar_answer_1 }}"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="grammar_answer_2">{{ $exam['grammar_question_2'] }}</label>
                        <input type="text" name="grammar_answer_2" id="grammar_answer_2"
                            value="{{ $exam_answers->grammar_answer_2 }}"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="grammar_answer_3">{{ $exam['grammar_question_3'] }}</label>
                        <input type="text" name="grammar_answer_3" id="grammar_answer_3"
                            value="{{ $exam_answers->grammar_answer_3 }}"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="grammar_answer_4">{{ $exam['grammar_question_4'] }}</label>
                        <input type="text" name="grammar_answer_4" id="grammar_answer_4"
                            value="{{ $exam_answers->grammar_answer_4 }}"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="grammar_answer_5">{{ $exam['grammar_question_5'] }}</label>
                        <input type="text" name="grammar_answer_5" id="grammar_answer_5"
                            value="{{ $exam_answers->grammar_answer_5 }}"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>
                    <h3 class="text-xl font-semibold mb-3">2.2. Completa las siguientes oraciones.</h3>

                </div>

                <div class="mb-5 mt-10">
                    <h2 class="text-2xl font-semibold mb-3">3. Writing</h2>
                    <h3 class="text-xl font-semibold mb-3">3.1. A partir de la siguiente información, redacta un texto
                        breve.</h3>
                    <div class="mb-3">
                    </div>
                    <h3 class="text-xl font-semibold mb-3">3.2. A partir de la siguiente información, redacta un texto
                        más extenso.</h3>
                    <div class="mb-3">
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit"
                        class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg focus:outline-none hover:bg-indigo-600">Guardar
                        respuestas</button>
                    <button type="button"
                        class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg focus:outline-none hover:bg-indigo-600">Corrección</button>
                </div>
            </form>
        </div>
        </form>
    </div>
    </div>
@endsection
