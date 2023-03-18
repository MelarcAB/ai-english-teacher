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
}
