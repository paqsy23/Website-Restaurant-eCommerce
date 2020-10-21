<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function landing()
    {
        $user_login = json_decode(Cookie::get('user-login'));
        return view('landing', [
            "user" => $user_login
        ]);
    }
}

