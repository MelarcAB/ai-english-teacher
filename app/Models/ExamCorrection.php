<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCorrection extends Model
{
    use HasFactory;

    protected $table = 'exam_corrections';

    protected $fillable = [
        'reading_correction_1',
        'reading_correction_2',
        'reading_correction_3',
        'reading_correction_1_text',
        'reading_correction_2_text',
        'reading_correction_3_text',
        'reading_true_false_correction_1',
        'reading_true_false_correction_2',
        'reading_true_false_correction_3',
        'reading_true_false_correction_4',
        'reading_true_false_correction_5',
        'reading_true_false_correction_1_text',
        'reading_true_false_correction_2_text',
        'reading_true_false_correction_3_text',
        'reading_true_false_correction_4_text',
        'reading_true_false_correction_5_text',
        'grammar_correction_1',
        'grammar_correction_1_text',
        'grammar_correction_2',
        'grammar_correction_2_text',
        'grammar_correction_3',
        'grammar_correction_3_text',
        'grammar_correction_4',
        'grammar_correction_4_text',
        'grammar_correction_5',
        'grammar_correction_5_text',
        'vocabulary_correction_1',
        'vocabulary_correction_2',
        'vocabulary_correction_3',
        'vocabulary_correction_4',
        'vocabulary_correction_5',
        'vocabulary_correction_1_text',
        'vocabulary_correction_2_text',
        'vocabulary_correction_3_text',
        'vocabulary_correction_4_text',
        'vocabulary_correction_5_text',
        'exam_id',

        //scores
        'reading_score',
        'reading_true_false_score',
        'grammar_score',
        'vocabulary_score',
        'writing_score',
        'total_score',
    ];


    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
