<h3 class="text-xl font-semibold mb-3">2.1. Selecciona la opción correcta.</h3>
<div class="ml-5 mb-7">
    <div class="mb-3">
        <label class="block text-gray-700 font-semibold" for="grammar_answer_1">{{ $exam['grammar_question_1'] }}</label>
        @foreach (['A', 'B', 'C', 'D'] as $option)
            <div class="flex items-center mb-3 mt-3">
                <input type="radio" name="grammar_answer_1" value="{{ $option }}"
                    @if ($exam_answers->grammar_answer_1 == $option) checked @endif
                    class="h-4 w-4 text-indigo-500 border-2 border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                    {{ $exam_answers->grammar_answer_1 == 2 ? 'checked' : '' }}>
                <label for="grammar_answer_1" class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
            </div>
        @endforeach

        @if (!empty($exam_correction_generator->grammar_correction_1))
            <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                <div class="flex items-center">
                    <div class="text-xl mr-2">
                        @if ($exam_correction_generator->grammar_correction_1 != 'WRONG')
                            <i class="fas fa-check-circle text-green-500"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500"></i>
                        @endif
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Corrección:</p>
                        <p>{{ $exam_correction_generator->grammar_correction_1_text }}</p>
                    </div>
                </div>
            </div>
        @endif

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
                <label for="grammar_answer_2" class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
            </div>
        @endforeach
        @if (!empty($exam_correction_generator->grammar_correction_2))
            <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                <div class="flex items-center">
                    <div class="text-xl mr-2">
                        @if ($exam_correction_generator->grammar_correction_2 != 'WRONG')
                            <i class="fas fa-check-circle text-green-500"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500"></i>
                        @endif
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Corrección:</p>
                        <p>{{ $exam_correction_generator->grammar_correction_2_text }}</p>
                    </div>
                </div>
            </div>
        @endif
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
                <label for="grammar_answer_3" class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
            </div>
        @endforeach
        @if (!empty($exam_correction_generator->grammar_correction_3))
            <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                <div class="flex items-center">
                    <div class="text-xl mr-2">
                        @if ($exam_correction_generator->grammar_correction_3 != 'WRONG')
                            <i class="fas fa-check-circle text-green-500"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500"></i>
                        @endif
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Corrección:</p>
                        <p>{{ $exam_correction_generator->grammar_correction_3_text }}</p>
                    </div>
                </div>
            </div>
        @endif
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
                <label for="grammar_answer_4" class="ml-2 text-gray-700 font-semibold">{{ $option }}</label>
            </div>
        @endforeach
        @if (!empty($exam_correction_generator->grammar_correction_4))
            <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                <div class="flex items-center">
                    <div class="text-xl mr-2">
                        @if ($exam_correction_generator->grammar_correction_4 != 'WRONG')
                            <i class="fas fa-check-circle text-green-500"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500"></i>
                        @endif
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Corrección:</p>
                        <p>{{ $exam_correction_generator->grammar_correction_4_text }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!--Score-->
    @if (!is_null($exam_correction_generator->grammar_score))
        <div class="mt-3 p-3 bg-green-100 border-l-4 border-green-500 rounded">
            <div class="flex items-center">
                <div class="text-xl mr-2">
                    <i class="fas fa-star text-green-500"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Puntaje obtenido:</p>
                    <p>{{ $exam_correction_generator->grammar_score }} / 4</p>
                </div>
            </div>
        </div>
    @endif



</div>
