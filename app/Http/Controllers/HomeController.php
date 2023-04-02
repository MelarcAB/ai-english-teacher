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
        $user = auth()->user();
        $user->openai_token = $request->input('openai_token');
        $user->save();
        return redirect()->route('configuration')->with('message', 'Información guardada con éxito.');
    }
}
