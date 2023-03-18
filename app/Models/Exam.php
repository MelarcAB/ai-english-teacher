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
        'listening',
        'writing',
        'speaking',
        'level',
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
}
