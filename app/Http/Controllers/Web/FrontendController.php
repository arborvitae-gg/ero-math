<?php

namespace App\Http\Controllers\Web;

class FrontendController
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
