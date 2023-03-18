<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * El exmámen tendrá la siguiente estructura
         * Writing
         * Reading
         * Listening
         * Grammar
         * Vocabulary
         * 
         * 
         * 
         * 
         */
        /*
        A1 (Principiante)
        A2 (Elemental)
        B1 (Intermedio)
        B2 (Intermedio Alto)
        C1 (Avanzado)
        C2 (Maestría)
        */
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('level')->nullable()->default("-");
            //texto writing + 3 preguntas
            $table->text('writing')->nullable()->default("-");
            $table->text('writing_question_1')->nullable()->default("-");
            $table->text('writing_question_2')->nullable()->default("-");
            $table->text('writing_question_3')->nullable()->default("-");

            //respuesta writing
            $table->text('writing_answer_1')->nullable()->default("-");
            $table->text('writing_answer_2')->nullable()->default("-");
            $table->text('writing_answer_3')->nullable()->default("-");


            //gramatica
            $table->text('grammar_question_1')->nullable()->default("-");
            $table->text('grammar_question_2')->nullable()->default("-");
            $table->text('grammar_question_3')->nullable()->default("-");
            $table->text('grammar_question_4')->nullable()->default("-");
            $table->text('grammar_question_5')->nullable()->default("-");

            //respuesta gramatica
            $table->text('grammar_answer_1')->nullable()->default("-");
            $table->text('grammar_answer_2')->nullable()->default("-");
            $table->text('grammar_answer_3')->nullable()->default("-");
            $table->text('grammar_answer_4')->nullable()->default("-");
            $table->text('grammar_answer_5')->nullable()->default("-");
            //vocabulary
            $table->text('vocabulary_question_1')->nullable()->default("-");
            $table->text('vocabulary_question_2')->nullable()->default("-");
            $table->text('vocabulary_question_3')->nullable()->default("-");
            $table->text('vocabulary_question_4')->nullable()->default("-");
            $table->text('vocabulary_question_5')->nullable()->default("-");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
