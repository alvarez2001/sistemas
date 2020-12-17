<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function username()
    {
        return 'nickname';
    }


    public function showLoginForm()
    {
        return view('login.login');
    }


    public function login()
    {
        $credenciales = $this->validate(request(), [
            'nickname' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credenciales)) {
            return redirect()->route('homeAdmin');
        }
        return back()->withErrors(['nickname' => trans('auth.failed')])->withInput(request(['nickname']));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}