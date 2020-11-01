<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function landing()
    {
        $user_login = json_decode(Cookie::get('user-login'));
        return view('user.landing', [
            "user" => $user_login
        ]);
    }

    public function promos()
    {
        $user_login = json_decode(Cookie::get('user-login'));
        return view('user.promo', [
            "user" => $user_login
        ]);
    }

    public function desserts()
    {
        $user_login = json_decode(Cookie::get('user-login'));
        return view('user.dessert', [
            "user" => $user_login
        ]);
    }

    public function main_dishes()
    {
        $user_login = json_decode(Cookie::get('user-login'));
        return view('user.main-dish', [
            "user" => $user_login
        ]);
    }
    public function drinks()
    {
        $user_login = json_decode(Cookie::get('user-login'));
        return view('user.drink', [
            "user" => $user_login
        ]);
    }
}

