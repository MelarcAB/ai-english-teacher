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

     <!--Score-->


 </div>
