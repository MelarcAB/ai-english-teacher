<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//testapi
use App\Models\TestApi;

//exam generator
use App\Models\Generators\ExamGenerator;
//exam
use App\Models\Exam;
//exam answers
use App\Models\ExamAnswers;
//exception
use Exception;

class TestController extends Controller
{
    //

    function index()
    {
        return view('tests.index');
    }


    function generateResponse(Request $request)
    {


        try {
            $prompt = $request->input('prompt');

            $response = [];
            //switch del prompt
            switch ($prompt) {

                case 'generate_exam':
                    $ex = (new ExamGenerator())->generateExam();
                    //  $response['message'] = implode(', ', $ex->toArray());
                    $response['message'] = $ex->generateExamHtml();
                    break;
                default:
                    $test = new TestApi();
                    $message = $test->send($prompt);
                    $message = json_decode($message);
                    $message = $message->choices[0]->message->content;
                    $response['message'] = $message;
                    break;
            }



            return $response;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function landing()
    {

        //si el usuario esta logueado redirigir a home
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('layouts.landing');
    }


    function list()
    {
        //obtenemos todos los examenes del usuario logueado
        $exams = Exam::where('user_id', auth()->user()->id)->get();
        return view('exams.list', compact('exams'));
    }

    function show(Exam $exam)
    {
        //obtener respuestas del examen
        $exam_answers = ExamAnswers::where('user_id', auth()->user()->id)->where('exam_id', $exam->id)->first();
        //si no hay respuestas, crearlas
        if (!$exam_answers) {
            $exam_answers = new ExamAnswers();
            $exam_answers->user_id = auth()->user()->id;
            $exam_answers->exam_id = $exam->id;
            $exam_answers->save();
        }
        return view('exams.show', compact('exam', 'exam_answers'));
    }

    //create exam
    function create()
    {
        return view('exams.create');
    }

    function store(Request $request)
    {
        //el examen no se modifica, se guardan solo las respuestas
        //verificar si hay registro de respuestas para el examen y usuario
        //obtener el usuario logueado
        $user_id = auth()->user()->id;
        $exam_id = $request->input('exam_id');
        $exam_answers = ExamAnswers::where('user_id', $user_id)->where('exam_id', $exam_id)->first();

        //si no hay registro de respuestas, crearlo
        if (!$exam_answers) {
            $exam_answers = new ExamAnswers();
            $exam_answers->user_id = $user_id;
            $exam_answers->exam_id = $exam_id;
        }

        //guardar respuestas

        $exam_answers->reading_answer_1 = $request->input('reading_answer_1');
        $exam_answers->reading_answer_2 = $request->input('reading_answer_2');
        $exam_answers->reading_answer_3 = $request->input('reading_answer_3');
        $exam_answers->grammar_answer_1 = $request->input('grammar_answer_1');
        $exam_answers->grammar_answer_2 = $request->input('grammar_answer_2');
        $exam_answers->grammar_answer_3 = $request->input('grammar_answer_3');
        $exam_answers->grammar_answer_4 = $request->input('grammar_answer_4');
        $exam_answers->grammar_answer_5 = $request->input('grammar_answer_5');
        $exam_answers->vocabulary_answer_1 = $request->input('vocabulary_answer_1');
        $exam_answers->vocabulary_answer_2 = $request->input('vocabulary_answer_2');
        $exam_answers->vocabulary_answer_3 = $request->input('vocabulary_answer_3');


        $exam_answers->save();

        return redirect()->route('exam.show', $exam_id);
    }
}
