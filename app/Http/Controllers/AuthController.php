<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthenticationRequest;

class AuthController extends Controller
{
    public function login(AuthenticationRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $intendedUrl = session()->pull('intended_url');
 
            return redirect()->intended($intendedUrl);
        } else {
            return redirect()->route('login');
        }
    }

    public function logout() {
        Auth::logout();
    
        return redirect('/');
    }
}