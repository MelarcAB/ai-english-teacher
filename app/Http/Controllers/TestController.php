<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//testapi
use App\Models\TestApi;

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

            //switch del prompt
            switch ($prompt) {

                case 'generate_exam':
                    $prompt = 'Eres el profesor de ingles Xubing, te presentarás como tal. Genera examen en ingles de nivel de bachillerato.';
                    break;

                default:
                    break;
            }


            $test = new TestApi();
            $response = $test->send($prompt);
            return $response;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
