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
    @if (!is_null($exam_correction_generator->reading_true_false_score))
        <div class="mt-3 p-3 bg-green-100 border-l-4 border-green-500 rounded">
            <div class="flex items-center">
                <div class="text-xl mr-2">
                    <i class="fas fa-star text-green-500"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-700">Puntaje obtenido:</p>
                    <p>{{ $exam_correction_generator->reading_true_false_score }} / 5</p>
                </div>
            </div>
        </div>
    @endif
</div>
