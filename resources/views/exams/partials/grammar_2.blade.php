 <h3 class="text-xl font-semibold mb-3 ">2.2. Completa las siguientes oraciones (vocabulary)</h3>
 <div>
     <div class="ml-5 mb-5">
         <div class="mb-3">
             <label class="block text-gray-700 font-semibold"
                 for="vocabulary_question_1">{{ $exam['vocabulary_question_1'] }}</label>
             <input type="text" name="vocabulary_answer_1" id="vocabulary_question_1"
                 class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                 value="{{ $exam_answers->vocabulary_answer_1 }}">
         </div>

         @if (!empty($exam_correction_generator->vocabulary_correction_1))
             <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                 <div class="flex items-center">
                     <div class="text-xl mr-2">
                         @if ($exam_correction_generator->vocabulary_correction_1 != 'WRONG')
                             <i class="fas fa-check-circle text-green-500"></i>
                         @else
                             <i class="fas fa-times-circle text-red-500"></i>
                         @endif
                     </div>
                     <div>
                         <p class="font-semibold text-gray-700">Corrección:</p>
                         <p>{{ $exam_correction_generator->vocabulary_correction_1_text }}</p>
                     </div>
                 </div>
             </div>
         @endif

     </div>
     <div class="ml-5 mb-5">
         <div class="mb-3">
             <label class="block text-gray-700 font-semibold"
                 for="vocabulary_question_2">{{ $exam['vocabulary_question_2'] }}</label>
             <input type="text" name="vocabulary_answer_2" id="vocabulary_question_2"
                 class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                 value="{{ $exam_answers->vocabulary_answer_2 }}">
         </div>

         @if (!empty($exam_correction_generator->vocabulary_correction_2))
             <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                 <div class="flex items-center">
                     <div class="text-xl mr-2">
                         @if ($exam_correction_generator->vocabulary_correction_2 != 'WRONG')
                             <i class="fas fa-check-circle text-green-500"></i>
                         @else
                             <i class="fas fa-times-circle text-red-500"></i>
                         @endif
                     </div>
                     <div>
                         <p class="font-semibold text-gray-700">Corrección:</p>
                         <p>{{ $exam_correction_generator->vocabulary_correction_2_text }}</p>
                     </div>
                 </div>
             </div>
         @endif
     </div>
     <div class="ml-5 mb-5">
         <div class="mb-3">
             <label class="block text-gray-700 font-semibold"
                 for="vocabulary_question_3">{{ $exam['vocabulary_question_3'] }}</label>
             <input type="text" name="vocabulary_answer_3" id="vocabulary_question_3"
                 class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                 value="{{ $exam_answers->vocabulary_answer_3 }}">
         </div>

         @if (!empty($exam_correction_generator->vocabulary_correction_3))
             <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                 <div class="flex items-center">
                     <div class="text-xl mr-2">
                         @if ($exam_correction_generator->vocabulary_correction_3 != 'WRONG')
                             <i class="fas fa-check-circle text-green-500"></i>
                         @else
                             <i class="fas fa-times-circle text-red-500"></i>
                         @endif
                     </div>
                     <div>
                         <p class="font-semibold text-gray-700">Corrección:</p>
                         <p>{{ $exam_correction_generator->vocabulary_correction_3_text }}</p>
                     </div>
                 </div>
             </div>
         @endif
     </div>
     <div class="ml-5 mb-5">
         <div class="mb-3">
             <label class="block text-gray-700 font-semibold"
                 for="vocabulary_question_4">{{ $exam['vocabulary_question_4'] }}</label>
             <input type="text" name="vocabulary_answer_4" id="vocabulary_question_4"
                 class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                 value="{{ $exam_answers->vocabulary_answer_4 }}">
         </div>

         @if (!empty($exam_correction_generator->vocabulary_correction_4))
             <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                 <div class="flex items-center">
                     <div class="text-xl mr-2">
                         @if ($exam_correction_generator->vocabulary_correction_4 != 'WRONG')
                             <i class="fas fa-check-circle text-green-500"></i>
                         @else
                             <i class="fas fa-times-circle text-red-500"></i>
                         @endif
                     </div>
                     <div>
                         <p class="font-semibold text-gray-700">Corrección:</p>
                         <p>{{ $exam_correction_generator->vocabulary_correction_4_text }}</p>
                     </div>
                 </div>
             </div>
         @endif
     </div>
     <div class="ml-5 mb-5">
         <div class="mb-3">
             <label class="block text-gray-700 font-semibold"
                 for="vocabulary_question_5">{{ $exam['vocabulary_question_5'] }}</label>
             <input type="text" name="vocabulary_answer_5" id="vocabulary_question_5"
                 class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500"
                 value="{{ $exam_answers->vocabulary_answer_5 }}">
         </div>

         @if (!empty($exam_correction_generator->vocabulary_correction_5))
             <div class="mt-3 p-3 bg-yellow-100 border-l-4 border-yellow-500 rounded mb-5 mx-5">
                 <div class="flex items-center">
                     <div class="text-xl mr-2">
                         @if ($exam_correction_generator->vocabulary_correction_5 != 'WRONG')
                             <i class="fas fa-check-circle text-green-500"></i>
                         @else
                             <i class="fas fa-times-circle text-red-500"></i>
                         @endif
                     </div>
                     <div>
                         <p class="font-semibold text-gray-700">Corrección:</p>
                         <p>{{ $exam_correction_generator->vocabulary_correction_5_text }}</p>
                     </div>
                 </div>
             </div>
         @endif
     </div>

     <!--Score-->


 </div>
