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
         */
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('level')->nullable()->default("-");
            $table->string('title')->nullable()->default("-");
            //texto writing + 3 preguntas
            $table->text('writing')->nullable()->default("-");
            $table->text('writing_question_1')->nullable()->default("-");
            $table->text('writing_question_2')->nullable()->default("-");
            $table->text('writing_question_3')->nullable()->default("-");

            //respuesta writing
            $table->text('writing_answer_1')->nullable()->default("-");
            $table->text('writing_answer_2')->nullable()->default("-");
            $table->text('writing_answer_3')->nullable()->default("-");



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
