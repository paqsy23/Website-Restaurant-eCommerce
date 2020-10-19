<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function loginPage()
    {
        return view('login-register.login-register');
    }

    public function loginProcess(Request $request)
    {

    }

    public function registerProcess(Request $request)
    {
        
    }
}
