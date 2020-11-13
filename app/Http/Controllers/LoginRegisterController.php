<?php

namespace App\Http\Controllers;

use App\Models\Models\User;
use App\Rules\CheckEmail;
use App\Rules\CheckUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginRegisterController extends Controller
{
    public function loginPage()
    {
        return view('login-register.login');
    }

    public function registerPage()
    {
        return view('login-register.register');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            "user_login" => "required",
            "pass_login" => "required"
        ], [
            "required" => "This field is required"
        ]);

        if ($request->user_login == "admin" && $request->pass_login == "admin") {
            // Admin
            $admin = (object)[
                'id_user' => 'admin',
                'nama' => 'admin',
                'email' => 'admin@gmail.com'
            ];
            $request->session()->put('user-login', $admin);
            return redirect('admin');
        } else {
            // User
            $users = User::all();
            foreach ($users as $user) {
                if ($user->id_user == $request->user_login || $user->email == $request->user_login) {
                    // Check username / email
                    if (password_verify($request->pass_login, $user->password)) {
                        // Password matched
                        $request->session()->put('user-login', $user);
                        return redirect('/');
                    } else {
                        return redirect("login")->with([
                            "warning" => "Wrong password"
                        ]);
                    }
                }
            }

            return redirect('login')->with([
                'warning' => "User not found"
            ]);

        }
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            "user_register" => [ "required", new CheckUsername() ],
            "name_register" => "required",
            "email_register" => [ "required", "email", new CheckEmail() ],
            "pass_register" => "required",
            "confirm_register" => "required|same:pass_register",
            "telp_register" => "required|numeric"
        ], [
            "required" => "This field is required",
            "same:pass_register" => "Confirm password must as same as password",
            "email" => "This field must be filled with email format",
            "numeric" => "This field must be filled with numeric character"
        ]);

        User::create([
            "id_user" => $request->user_register,
            "nama" => $request->name_register,
            "email" => $request->email_register,
            "password" => password_hash($request->pass_register, PASSWORD_BCRYPT),
            "notelp" => $request->telp_register
        ]);

        return redirect("register")->with([
            "success" => "Registration Success"
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user-login');
        return redirect('/');
    }
}
