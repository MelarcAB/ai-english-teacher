<h3 class="text-xl font-semibold mb-3">1.1. Lee el texto y responde las preguntas.</h3>
<div class="mb-3">
    <label class="block text-gray-700 font-semibold" for="reading_answer_1">{{ $exam['reading_question_1'] }}</label>
    <input type="text" name="reading_answer_1" id="reading_answer_1"
        class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
        value="{{ $exam_answers->reading_answer_1 }}">
</div>


@if (!empty($exam_correction_generator->reading_correction_1))
    <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
        <div class="flex items-center">
            <div class="text-xl mr-2">
                @if ($exam_correction_generator->reading_correction_1 != 'WRONG')
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
</div>
<div class="mb-3">
    <label class="block text-gray-700 font-semibold" for="reading_answer_2">{{ $exam['reading_question_2'] }}</label>
    <input type="text" name="reading_answer_2" id="reading_answer_2"
        class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
        value="{{ $exam_answers->reading_answer_2 }}">
</div>


@if (!empty($exam_correction_generator->reading_correction_2))
    <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
        <div class="flex items-center">
            <div class="text-xl mr-2">
                @if ($exam_correction_generator->reading_correction_2 != 'WRONG')
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
    <label class="block text-gray-700 font-semibold" for="reading_answer_3">{{ $exam['reading_question_3'] }}</label>
    <input type="text" name="reading_answer_3" id="reading_answer_3"
        class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
        value="{{ $exam_answers->reading_answer_3 }}">
</div>

@if (!empty($exam_correction_generator->reading_correction_3))
    <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
        <div class="flex items-center">
            <div class="text-xl mr-2">
                @if ($exam_correction_generator->reading_correction_3 != 'WRONG')
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
