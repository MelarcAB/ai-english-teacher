<div class="mb-5 mt-10">
    <h2 class="text-2xl font-semibold mb-3">3. Writing</h2>

</div>
<h3 class="text-xl font-semibold mb-3">3.1. A partir de la siguiente información, redacta un texto
    de unas 150 palabras.</h3>
<div class="mb-3">
    <label class="block text-gray-700 font-semibold" for="writing_answer">{{ $exam['writing'] }}</label>
    <textarea name="writing_answer" cols="30" rows="10"
        class="w-full border-2 border-gray-300 p-4 rounded-lg focus:outline-none focus:border-indigo-500"
        placeholder="Escribe aquí tu respuesta">{{ $exam_answers->writing_answer }}</textarea>
</div>
@if (!is_null($exam_correction_generator->writing_score))
    <div class="mt-3 p-3 bg-green-100 border-l-4 border-green-500 rounded">
        <div class="flex items-center">
            <div class="text-xl mr-2">
                <i class="fas fa-star text-green-500"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-700">Puntaje obtenido:</p>
                <p>{{ $exam_correction_generator->writing_correction_text }}</p>
                <p class="font-bold">{{ $exam_correction_generator->writing_score }} / 5</p>
            </div>
        </div>
    </div>
@endif
