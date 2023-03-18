<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//google login
use Socialite;
use App\Models\User;

class AuthController extends Controller
{

    function show()
    {
        return view('auth.login');
    }

    function singin(Request $request)
    {
    }

    function create()
    {
        return view('auth.register');
    }






    //google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
    }
}
