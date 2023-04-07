<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    function index()
    {
        return view('home.index');
    }

    function configuration()
    {
        return view('users.index');
    }

    //store
    function store(Request $request)
    {
        //openai_model solo podrá tener dos valores gpt-3.5-turbo-0301 /gpt-4-0314
        $validation_msg = [
            'openai_token.min' => 'El token de OpenAI debe tener al menos 10 caracteres.',
            'openai_token.max' => 'El token de OpenAI debe tener máximo 100 caracteres.',
            'openai_model.in' => 'El modelo de OpenAI debe estar disponible en el listado.',
        ];

        $request->validate([
            //nullable
            'openai_token' => 'nullable|min:10|max:100',
            'openai_model' => 'required|in:gpt-3.5-turbo-0301,gpt-4-0314',
        ], $validation_msg);

        $user = auth()->user();
        $user->openai_token = $request->input('openai_token');
        $user->openai_model = $request->input('openai_model');
        $user->save();
        return redirect()->route('configuration')->with('message', 'Información guardada con éxito.');
    }
}
