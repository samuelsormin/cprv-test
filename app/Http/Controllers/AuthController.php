<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function login() {
        return view('page.login');
    }

    public function authenticate(Request $request) {
        if(empty($request->pin)) {
            return redirect()->back()->withErrors('Pin number is required!');
        }

        $user = User::findByPin($request->pin);

        if($user) {
            if(Auth::loginUsingId($user->id)) {
                return redirect()->route('home');
            }
        }
        
        return redirect()->back()->withErrors('Wrong pin! Please try again.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
