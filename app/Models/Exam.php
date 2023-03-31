<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'reading',
        'reading_question_1',
        'reading_question_2',
        'reading_question_3',
        'reading_true_false_1',
        'reading_true_false_2',
        'reading_true_false_3',
        'reading_true_false_4',
        'reading_true_false_5',
        'reading_question_4',
        'grammar_question_1',
        'grammar_question_2',
        'grammar_question_3',
        'grammar_question_4',
        'grammar_question_5',
        'vocabulary_question_1',
        'vocabulary_question_2',
        'vocabulary_question_3',
        'vocabulary_question_4',
        'vocabulary_question_5',
        'listening',
        'writing',
        'speaking',
        'level',
        'status',
        'user_id',
    ];


    //serialize Exam to string
    public function obj_to_string()
    {
        $obj = $this;
        $str = "";
        foreach ($obj as $key => $value) {
            $str .= "<b>" . $key . "</b>" . " : " . $value . " | ";
        }
        return $str;
    }


    public function generateExamHtml()
    {
        $html = '<div class="p-6 bg-white rounded-md shadow-lg space-y-6">';
        $html .= '<h2 class="text-2xl font-bold mb-4">Examen de nivel ' . $this->level . '</h2>';

        $html .= '<div class="border-l-4 border-teal-500 pl-4">';
        $html .= '<h3 class="text-lg font-semibold mb-2">Reading</h3>';
        $html .= '<p class="mb-2">' . $this->reading . '</p>';
        $html .= '<ol class="list-decimal pl-4 space-y-1">';
        $html .= '<li>' . $this->reading_question_1 . '</li>';
        $html .= '<li>' . $this->reading_question_2 . '</li>';
        $html .= '<li>' . $this->reading_question_3 . '</li>';
        $html .= '</ol>';
        $html .= '</div>';

        $html .= '<div class="border-l-4 border-purple-500 pl-4">';
        $html .= '<h3 class="text-lg font-semibold mb-2">Listening</h3>';
        $html .= '<p>' . $this->listening . '</p>';
        $html .= '</div>';

        //grammar
        $html .= '<div class="border-l-4 border-red-500 pl-4">';
        $html .= '<h3 class="text-lg font-semibold mb-2">Grammar</h3>';
        $html .= '<ol class="list-decimal pl-4 space-y-1">';
        $html .= '<li>' . $this->grammar_question_1 . '</li>';
        $html .= '<li>' . $this->grammar_question_2 . '</li>';
        $html .= '<li>' . $this->grammar_question_3 . '</li>';
        $html .= '<li>' . $this->grammar_question_4 . '</li>';
        $html .= '<li>' . $this->grammar_question_5 . '</li>';
        $html .= '</ol>';
        $html .= '</div>';


        $html .= '<div class="border-l-4 border-yellow-500 pl-4">';
        $html .= '<h3 class="text-lg font-semibold mb-2">Writing</h3>';
        $html .= '<p>' . $this->writing . '</p>';
        $html .= '</div>';

        $html .= '<div class="border-l-4 border-green-500 pl-4">';
        $html .= '<h3 class="text-lg font-semibold mb-2">Speaking</h3>';
        $html .= '<p>' . $this->speaking . '</p>';
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }


    //user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //exam_answers
    public function exam_answers()
    {
        return $this->hasMany(ExamAnswers::class);
    }

    //exam_correction
    public function exam_corrections()
    {
        return $this->hasMany(ExamCorrection::class);
    }
}
