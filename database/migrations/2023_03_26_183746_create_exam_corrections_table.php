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
        Schema::create('exam_corrections', function (Blueprint $table) {
            $table->id();

            //user
            //$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('reading_correction_1')->nullable();
            $table->text('reading_correction_2')->nullable();
            $table->text('reading_correction_3')->nullable();
            $table->text('reading_correction_1_text')->nullable();
            $table->text('reading_correction_2_text')->nullable();
            $table->text('reading_correction_3_text')->nullable();
            //puntuacion num con decimales
            $table->decimal('reading_score', 8, 2)->nullable();


            //respuesta reading true false
            $table->text('reading_true_false_correction_1')->nullable();
            $table->text('reading_true_false_correction_2')->nullable();
            $table->text('reading_true_false_correction_3')->nullable();
            $table->text('reading_true_false_correction_4')->nullable();
            $table->text('reading_true_false_correction_5')->nullable();
            $table->text('reading_true_false_correction_1_text')->nullable();
            $table->text('reading_true_false_correction_2_text')->nullable();
            $table->text('reading_true_false_correction_3_text')->nullable();
            $table->text('reading_true_false_correction_4_text')->nullable();
            $table->text('reading_true_false_correction_5_text')->nullable();
            //puntuacion
            $table->decimal('reading_true_false_score', 8, 2)->nullable();

            //respuesta gramatica
            $table->text('grammar_correction_1')->nullable();
            $table->text('grammar_correction_1_text')->nullable();
            $table->text('grammar_correction_2')->nullable();
            $table->text('grammar_correction_2_text')->nullable();
            $table->text('grammar_correction_3')->nullable();
            $table->text('grammar_correction_3_text')->nullable();
            $table->text('grammar_correction_4')->nullable();
            $table->text('grammar_correction_4_text')->nullable();
            $table->text('grammar_correction_5')->nullable();
            $table->text('grammar_correction_5_text')->nullable();
            //puntuacion
            $table->decimal('grammar_score', 8, 2)->nullable();

            //respuesta vocabulary
            $table->text('vocabulary_correction_1')->nullable();
            $table->text('vocabulary_correction_2')->nullable();
            $table->text('vocabulary_correction_3')->nullable();
            $table->text('vocabulary_correction_4')->nullable();
            $table->text('vocabulary_correction_5')->nullable();


            $table->text('vocabulary_correction_1_text')->nullable();
            $table->text('vocabulary_correction_2_text')->nullable();
            $table->text('vocabulary_correction_3_text')->nullable();
            $table->text('vocabulary_correction_4_text')->nullable();
            $table->text('vocabulary_correction_5_text')->nullable();
            //puntuacion
            $table->decimal('vocabulary_score', 8, 2)->nullable();

            //respuesta writing
            $table->text('writing_correction')->nullable();
            $table->text('writing_correction_text')->nullable();
            //puntuacion
            $table->decimal('writing_score', 8, 2)->nullable();

            //final score
            $table->decimal('final_score', 8, 2)->nullable();
            //exam
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_corrections');
    }
};
