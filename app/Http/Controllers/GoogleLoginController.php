<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        //Fizemos o login através do google, e buscamos por um usuário no banco com o dado email
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        
        if(!$user) {
            return abort(401);
        }

        Auth::login($user);
        //Here we're using a value set on auth middleware
        $intendedUrl = session()->pull('intended_url');
        
        return redirect()->intended($intendedUrl);
    }
}