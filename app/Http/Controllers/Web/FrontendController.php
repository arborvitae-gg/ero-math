<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

class FrontendController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function showDashboard()
    {
        return view('dashboard');
    }
}
