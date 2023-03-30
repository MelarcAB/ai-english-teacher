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
            $table->string('level')->nullable();
            //texto writing + 3 preguntas
            $table->text('reading')->nullable();
            $table->text('reading_question_1')->nullable();
            $table->text('reading_question_2')->nullable();
            $table->text('reading_question_3')->nullable();

            //reading true false
            $table->text('reading_true_false_1')->nullable();
            $table->text('reading_true_false_2')->nullable();
            $table->text('reading_true_false_3')->nullable();
            $table->text('reading_true_false_4')->nullable();
            $table->text('reading_true_false_5')->nullable();

            //gramatica
            $table->text('grammar_question_1')->nullable();
            $table->text('grammar_question_2')->nullable();
            $table->text('grammar_question_3')->nullable();
            $table->text('grammar_question_4')->nullable();
            $table->text('grammar_question_5')->nullable();


            //vocabulary
            $table->text('vocabulary_question_1')->nullable();
            $table->text('vocabulary_question_2')->nullable();
            $table->text('vocabulary_question_3')->nullable();
            $table->text('vocabulary_question_4')->nullable();
            $table->text('vocabulary_question_5')->nullable();

            //writing
            $table->text('writing')->nullable();

            //status
            // 0 - creating
            // 1 - created
            // 2 - completed
            // 3 - in correction
            // 4 - corrected
            $table->integer('status')->nullable()->default(0);


            //user_id
            $table->unsignedBigInteger('user_id')->constraint()->onDelete('cascade');

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
