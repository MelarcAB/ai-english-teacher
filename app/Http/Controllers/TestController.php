<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//testapi
use App\Models\TestApi;

//exam generator
use App\Models\Generators\ExamGenerator;
//exam
use App\Models\Exam;
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
        return view('exams.show', compact('exam'));
    }

    //create exam
    function create()
    {
        return view('exams.create');
    }
}
