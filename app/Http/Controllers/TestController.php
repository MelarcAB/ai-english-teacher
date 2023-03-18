<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//testapi
use App\Models\TestApi;

//exam generator
use App\Models\Generators\ExamGenerator;

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
                    $response['message'] = implode(', ', $ex->toArray());
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
}
