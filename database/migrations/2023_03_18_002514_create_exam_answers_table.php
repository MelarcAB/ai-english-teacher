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
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->id();

            //user
            //$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('reading_answer_1')->nullable();
            $table->text('reading_answer_2')->nullable();
            $table->text('reading_answer_3')->nullable();


            //respuesta reading true false
            $table->text('reading_true_false_answer_1')->nullable();
            $table->text('reading_true_false_answer_2')->nullable();
            $table->text('reading_true_false_answer_3')->nullable();
            $table->text('reading_true_false_answer_4')->nullable();
            $table->text('reading_true_false_answer_5')->nullable();



            //respuesta gramatica
            $table->text('grammar_answer_1')->nullable();
            $table->text('grammar_answer_2')->nullable();
            $table->text('grammar_answer_3')->nullable();
            $table->text('grammar_answer_4')->nullable();
            $table->text('grammar_answer_5')->nullable();

            //respuesta vocabulary
            $table->text('vocabulary_answer_1')->nullable();
            $table->text('vocabulary_answer_2')->nullable();
            $table->text('vocabulary_answer_3')->nullable();
            $table->text('vocabulary_answer_4')->nullable();
            $table->text('vocabulary_answer_5')->nullable();

            //respuesta writing
            $table->text('writing_answer')->nullable();


            //is_correction
            $table->boolean('is_correction')->nullable()->default(false);

            //exam
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');
            //user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_answers');
    }
};
