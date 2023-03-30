<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAnswers extends Model
{
    use HasFactory;

    protected $table = 'exam_answers';

    protected $fillable = [
        'reading_answer_1',
        'reading_answer_2',
        'reading_answer_3',
        'grammar_answer_1',
        'grammar_answer_2',
        'grammar_answer_3',
        'grammar_answer_4',
        'grammar_answer_5',
        'vocabulary_answer_1',
        'vocabulary_answer_2',
        'vocabulary_answer_3',
        'vocabulary_answer_4',
        'vocabulary_answer_5',
        'writing_answer',
        'is_correction',
        'exam_id',
        'user_id',
    ];


    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
