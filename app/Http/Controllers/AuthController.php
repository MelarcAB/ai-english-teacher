<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//google login
use Socialite;
use App\Models\User;
//auth
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function show()
    {
        //si esta logueado, redirigir a home
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    function singin(Request $request)
    {
    }

    function create()
    {
        //si esta logueado, redirigir a home
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }



    //logout 
    function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login.show');
    }


    //google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        // Verificar si el usuario ya existe en la base de datos por email
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            // Si el usuario ya existe, actualizar su google_id y iniciar sesión
            $user->provider_id = $googleUser->id;
            $user->save();
        } else {
            //crear usuario
            $user = User::create([
                'name' => $googleUser->name,
                'username' => $this->generateUniqueUsername($googleUser->email),
                'email' => $googleUser->email,
                'provider_id' => $googleUser->id,
                'password' => bcrypt($googleUser->id . $googleUser->name)
            ]);
            $user->save();
        }
        $login = Auth::login($user);

        $token = $user->createToken('auth_token')->plainTextToken;


        //redirect a /home
        return redirect()->route('home');
    }

    public function generateUniqueUsername($email = "")
    {
        if ($email == "") return false;
        // Remover todo lo que no sea letras o números del email

        //obtener todo el texto antes del @
        $newUsername = explode("@", $email)[0];
        $newUsername = preg_replace("/[^a-zA-Z0-9]+/", "", $newUsername);




        // Verificar si el nombre de usuario ya existe en la base de datos
        $check = User::where('username', $newUsername)->first();


        // Si el nombre de usuario ya existe, agregar un número al final hasta que sea único
        $i = 1;
        while ($check) {
            $newUsername = $newUsername . $i;
            $check = User::where('username', $newUsername)->first();
            $i++;
        }

        return $newUsername;
    }
}
