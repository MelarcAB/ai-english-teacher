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

                    @if (!empty($exam_correction_generator->reading_correction_1_text))
                        <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                            <div class="flex items-center">
                                <div class="text-xl mr-2">
                                    @if ($exam_correction_generator->reading_correction_1)
                                        <i class="fas fa-check-circle text-green-500"></i>
                                    @else
                                        <i class="fas fa-times-circle text-red-500"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">Corrección:</p>
                                    <p>{{ $exam_correction_generator->reading_correction_1_text }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_answer_2">{{ $exam['reading_question_2'] }}</label>
                        <input type="text" name="reading_answer_2" id="reading_answer_2"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                            value="{{ $exam_answers->reading_answer_2 }}">
                    </div>


                    @if (!empty($exam_correction_generator->reading_correction_2_text))
                        <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                            <div class="flex items-center">
                                <div class="text-xl mr-2">
                                    @if ($exam_correction_generator->reading_correction_2)
                                        <i class="fas fa-check-circle text-green-500"></i>
                                    @else
                                        <i class="fas fa-times-circle text-red-500"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">Corrección:</p>
                                    <p>{{ $exam_correction_generator->reading_correction_2_text }}</p>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_answer_3">{{ $exam['reading_question_3'] }}</label>
                        <input type="text" name="reading_answer_3" id="reading_answer_3"
                            class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                            value="{{ $exam_answers->reading_answer_3 }}">
                    </div>


                    @if (!empty($exam_correction_generator->reading_correction_3_text))
                        <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                            <div class="flex items-center">
                                <div class="text-xl mr-2">
                                    @if ($exam_correction_generator->reading_correction_3)
                                        <i class="fas fa-check-circle text-green-500"></i>
                                    @else
                                        <i class="fas fa-times-circle text-red-500"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">Corrección:</p>
                                    <p>{{ $exam_correction_generator->reading_correction_3_text }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (!is_null($exam_correction_generator->reading_score))
                        <div class="mt-3 p-3 bg-green-100 border-l-4 border-green-500 rounded">
                            <div class="flex items-center">
                                <div class="text-xl mr-2">
                                    <i class="fas fa-star text-green-500"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">Puntaje obtenido:</p>
                                    <p>{{ $exam_correction_generator->reading_score }} / 3</p>
                                </div>
                            </div>
                        </div>
                    @endif


                    <h3 class="text-xl font-semibold mb-5 mt-5">1.2. Lee el texto y responde si las frases son verdaderas o
                        falsas.</h3>
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_true_false_answer_1">{{ $exam['reading_true_false_1'] }}</label>
                        <div class="ml-3">
                            <div class="flex items-center mb-3 mt-3">
                                <input type="radio" name="reading_true_false_answer_1" value="1"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_1 == 1 ? 'checked' : '' }}>
                                <label for="true-checkbox" class="ml-2 text-gray-700 font-semibold">True</label>
                            </div>
                            <div class="flex items-center mb-3">
                                <input type="radio" name="reading_true_false_answer_1" value="2"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_1 == 2 ? 'checked' : '' }}>
                                <label for="false-checkbox" class="ml-2 text-gray-700 font-semibold">False</label>
                            </div>

                            @if (
                                !is_null($exam_correction_generator->reading_true_false_correction_1) ||
                                    !is_null($exam_correction_generator->reading_true_false_correction_1_text))
                                <div
                                    class="mt-3 p-3
                                @if ($exam_correction_generator->reading_true_false_correction_1 == 'OK') border-green-500 bg-green-100 @else border-red-500 bg-red-100 @endif border-l-4  rounded">
                                    <div class="flex items-center">
                                        <div class="text-xl mr-2">
                                            @if ($exam_correction_generator->reading_true_false_correction_1 == 'OK')
                                                <i class="fas fa-star text-green-500"></i>
                                            @else
                                                <i class="fas fa-times-circle text-red-500"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-700">Corrección:</p>
                                            <p>{{ $exam_correction_generator->reading_true_false_correction_1_text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>


                    </div>
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_true_false_answer_2">{{ $exam['reading_true_false_2'] }}</label>
                        <div class="ml-3">
                            <div class="flex items-center mb-3 mt-3">
                                <input type="radio" name="reading_true_false_answer_2" value="1"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_2 == 1 ? 'checked' : '' }}>
                                <label for="true-checkbox" class="ml-2 text-gray-700 font-semibold">True</label>

                            </div>
                            <div class="flex items-center mb-3">
                                <input type="radio" name="reading_true_false_answer_2" value="2"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_2 == 2 ? 'checked' : '' }}>
                                <label for="false-checkbox" class="ml-2 text-gray-700 font-semibold">False</label>
                            </div>
                            @if (
                                !is_null($exam_correction_generator->reading_true_false_correction_2) ||
                                    !is_null($exam_correction_generator->reading_true_false_correction_2_text))
                                <div
                                    class="mt-3 p-3
                                @if ($exam_correction_generator->reading_true_false_correction_2 == 'OK') border-green-500 bg-green-100 @else border-red-500 bg-red-100 @endif border-l-4  rounded">
                                    <div class="flex items-center">
                                        <div class="text-xl mr-2">
                                            @if ($exam_correction_generator->reading_true_false_correction_2 == 'OK')
                                                <i class="fas fa-star text-green-500"></i>
                                            @else
                                                <i class="fas fa-times-circle text-red-500"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-700">Corrección:</p>
                                            <p>{{ $exam_correction_generator->reading_true_false_correction_2_text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_true_false_answer_3">{{ $exam['reading_true_false_3'] }}</label>
                        <div class="ml-3">
                            <div class="flex items-center mb-3 mt-3">
                                <input type="radio" name="reading_true_false_answer_3" value="1"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_3 == 1 ? 'checked' : '' }}>
                                <label for="true-checkbox" class="ml-2 text-gray-700 font-semibold">True</label>
                            </div>
                            <div class="flex items-center mb-3">
                                <input type="radio" name="reading_true_false_answer_3" value="2"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_3 == 2 ? 'checked' : '' }}>
                                <label for="false-checkbox" class="ml-2 text-gray-700 font-semibold">False</label>
                            </div>
                            @if (
                                !is_null($exam_correction_generator->reading_true_false_correction_3) ||
                                    !is_null($exam_correction_generator->reading_true_false_correction_3_text))
                                <div
                                    class="mt-3 p-3
                                @if ($exam_correction_generator->reading_true_false_correction_3 == 'OK') border-green-500 bg-green-100 @else border-red-500 bg-red-100 @endif border-l-4  rounded">
                                    <div class="flex items-center">
                                        <div class="text-xl mr-2">
                                            @if ($exam_correction_generator->reading_true_false_correction_3 == 'OK')
                                                <i class="fas fa-star text-green-500"></i>
                                            @else
                                                <i class="fas fa-times-circle text-red-500"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-700">Corrección:</p>
                                            <p>{{ $exam_correction_generator->reading_true_false_correction_3_text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_true_false_answer_4">{{ $exam['reading_true_false_4'] }}</label>
                        <div class="ml-3">
                            <div class="flex items-center mb-3 mt-3">
                                <input type="radio" name="reading_true_false_answer_4" value="1"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_4 == 1 ? 'checked' : '' }}>
                                <label for="true-checkbox" class="ml-2 text-gray-700 font-semibold">True</label>
                            </div>
                            <div class="flex items-center mb-3">
                                <input type="radio" name="reading_true_false_answer_4" value="2"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_4 == 2 ? 'checked' : '' }}>
                                <label for="false-checkbox" class="ml-2 text-gray-700 font-semibold">False</label>
                            </div>
                            @if (
                                !is_null($exam_correction_generator->reading_true_false_correction_4) ||
                                    !is_null($exam_correction_generator->reading_true_false_correction_4_text))
                                <div
                                    class="mt-3 p-3
                                @if ($exam_correction_generator->reading_true_false_correction_4 == 'OK') border-green-500 bg-green-100 @else border-red-500 bg-red-100 @endif border-l-4  rounded">
                                    <div class="flex items-center">
                                        <div class="text-xl mr-2">
                                            @if ($exam_correction_generator->reading_true_false_correction_4 == 'OK')
                                                <i class="fas fa-star text-green-500"></i>
                                            @else
                                                <i class="fas fa-times-circle text-red-500"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-700">Corrección:</p>
                                            <p>{{ $exam_correction_generator->reading_true_false_correction_4_text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold"
                            for="reading_true_false_answer_5">{{ $exam['reading_true_false_5'] }}</label>
                        <div class="ml-3">
                            <div class="flex items-center mb-3 mt-3">
                                <input type="radio" name="reading_true_false_answer_5" value="1"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_5 == 1 ? 'checked' : '' }}>
                                <label for="true-checkbox" class="ml-2 text-gray-700 font-semibold">True</label>
                            </div>
                            <div class="flex items-center mb-3">
                                <input type="radio" name="reading_true_false_answer_5" value="2"
                                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                    {{ $exam_answers->reading_true_false_answer_5 == 2 ? 'checked' : '' }}>
                                <label for="false-checkbox" class="ml-2 text-gray-700 font-semibold">False</label>
                            </div>

                            @if (
                                !is_null($exam_correction_generator->reading_true_false_correction_5) ||
                                    !is_null($exam_correction_generator->reading_true_false_correction_5_text))
                                <div
                                    class="mt-3 p-3
                                @if ($exam_correction_generator->reading_true_false_correction_5 == 'OK') border-green-500 bg-green-100 @else border-red-500 bg-red-100 @endif border-l-4  rounded">
                                    <div class="flex items-center">
                                        <div class="text-xl mr-2">
                                            @if ($exam_correction_generator->reading_true_false_correction_5 == 'OK')
                                                <i class="fas fa-star text-green-500"></i>
                                            @else
                                                <i class="fas fa-times-circle text-red-500"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-700">Corrección:</p>
                                            <p>{{ $exam_correction_generator->reading_true_false_correction_5_text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="mb-5 mt-10">
                    <h2 class="text-2xl font-semibold mb-3">2. Gramática</h2>
                    <h3 class="text-xl font-semibold mb-3">2.1. Selecciona la opción correcta.</h3>
                    <div class="ml-5 mb-5">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="grammar_answer_1">{{ $exam['grammar_question_1'] }}</label>
                            @foreach (['A', 'B', 'C', 'D'] as $option)
                                <div class="flex items-center mb-3 mt-3">
                                    <input type="radio" name="grammar_answer_1" value="{{ $option }}"
                                        @if ($exam_answers->grammar_answer_1 == $option) checked @endif
                                        class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                        {{ $exam_answers->grammar_answer_1 == 2 ? 'checked' : '' }}>
                                    <label for="grammar_answer_1"
                                        class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="grammar_answer_2">{{ $exam['grammar_question_2'] }}</label>
                            @foreach (['A', 'B', 'C', 'D'] as $option)
                                <div class="flex items-center mb-3 mt-3">
                                    <input type="radio" name="grammar_answer_2" value="{{ $option }}"
                                        @if ($exam_answers->grammar_answer_2 == $option) checked @endif
                                        class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                        {{ $exam_answers->grammar_answer_2 == 2 ? 'checked' : '' }}>
                                    <label for="grammar_answer_2"
                                        class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="grammar_answer_3">{{ $exam['grammar_question_3'] }}</label>
                            @foreach (['A', 'B', 'C', 'D'] as $option)
                                <div class="flex items-center mb-3 mt-3">
                                    <input type="radio" name="grammar_answer_3" value="{{ $option }}"
                                        @if ($exam_answers->grammar_answer_3 == $option) checked @endif
                                        class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                        {{ $exam_answers->grammar_answer_3 == 2 ? 'checked' : '' }}>
                                    <label for="grammar_answer_3"
                                        class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="grammar_answer_4">{{ $exam['grammar_question_4'] }}</label>
                            @foreach (['A', 'B', 'C', 'D'] as $option)
                                <div class="flex items-center mb-3 mt-3">
                                    <input type="radio" name="grammar_answer_4" value="{{ $option }}"
                                        @if ($exam_answers->grammar_answer_4 == $option) checked @endif
                                        class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                                        {{ $exam_answers->grammar_answer_4 == 2 ? 'checked' : '' }}>
                                    <label for="grammar_answer_4"
                                        class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <h3 class="text-xl font-semibold mb-3">2.2. Completa las siguientes oraciones (vocabulary)</h3>
                    <div class="ml-5 mb-5">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="vocabulary_question_1">{{ $exam['vocabulary_question_1'] }}</label>
                            <input type="text" name="vocabulary_answer_1" id="vocabulary_question_1"
                                class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                                value="{{ $exam_answers->vocabulary_answer_1 }}">
                        </div>
                    </div>
                    <div class="ml-5 mb-5">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="vocabulary_question_2">{{ $exam['vocabulary_question_2'] }}</label>
                            <input type="text" name="vocabulary_answer_2" id="vocabulary_question_2"
                                class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                                value="{{ $exam_answers->vocabulary_answer_2 }}">
                        </div>
                    </div>
                    <div class="ml-5 mb-5">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="vocabulary_question_3">{{ $exam['vocabulary_question_3'] }}</label>
                            <input type="text" name="vocabulary_answer_3" id="vocabulary_question_3"
                                class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                                value="{{ $exam_answers->vocabulary_answer_3 }}">
                        </div>
                    </div>
                    <div class="ml-5 mb-5">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="vocabulary_question_4">{{ $exam['vocabulary_question_4'] }}</label>
                            <input type="text" name="vocabulary_answer_4" id="vocabulary_question_4"
                                class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                                value="{{ $exam_answers->vocabulary_answer_4 }}">
                        </div>
                    </div>
                    <div class="ml-5 mb-5">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-semibold"
                                for="vocabulary_question_5">{{ $exam['vocabulary_question_5'] }}</label>
                            <input type="text" name="vocabulary_answer_5" id="vocabulary_question_5"
                                class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                                value="{{ $exam_answers->vocabulary_answer_5 }}">
                        </div>
                    </div>

                    <div class="mb-5 mt-10">
                        <h2 class="text-2xl font-semibold mb-3">3. Writing</h2>

                    </div>
                    <h3 class="text-xl font-semibold mb-3">3.1. A partir de la siguiente información, redacta un texto
                        de unas 150 palabras.</h3>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-semibold"
                            for="writing_answer">{{ $exam['writing'] }}</label>
                        <textarea name="writing_answer" cols="30" rows="10"
                            class="w-full border-2 border-gray-300 p-4 rounded-lg focus:outline-none focus:border-indigo-500"
                            placeholder="Escribe aquí tu respuesta">{{ $exam_answers->writing_answer }}</textarea>
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
