<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class faqController extends Controller
{
    public function landing(Request $request)
    {
        $user_login = $request->session()->get('user-login');
        return view('faq.faq', [
            "user" => $user_login,
        ]);
    }
}
