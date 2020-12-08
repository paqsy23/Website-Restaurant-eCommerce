<?php

namespace App\Http\Controllers;

use App\Models\Models\User;
use Illuminate\Http\Request;
use App\Rules\CheckEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
    public function landing(Request $request)
    {
        $user_login = $request->session()->get('user-login');
        return view('profile.profile', [ "user" => $user_login, ]);
    }

    public function updateProfile(Request $request){
        $request->validate([
            "name_profile" => "required",
            "email_profile" => [ "required", "email" ],
            "telp_profile" => "required|numeric"
        ], [
            "required" => "This field is required",
            "email" => "This field must be filled with email format",
            "numeric" => "This field must be filled with numeric character"
        ]);
        $userid = $request->input('user_profile');
        $nama_baru = $request->input('name_profile');
        $email_baru = $request->input('email_profile');
        $telp_baru = $request->input('telp_profile');
        $affected = DB::table('user')
        ->where('id_user', $userid)
        ->update(['nama'=> $nama_baru, 'email'=>$email_baru, 'notelp'=>$telp_baru]);
        if ($affected){
            $request->session()->forget('user-login');
            $users = User::all();
            foreach ($users as $user) {
                if ($user->id_user == $userid) {
                    $request->session()->put('user-login', $user);
                    return redirect()->action('ProfileController@landing')->with([
                        "success" => "Profile Update Success!"
                    ]);
                }
            }
        }
    }
    
    public function updatePassword(Request $request){
        $user_login = $request->session()->get('user-login');
        $request->validate([
            "oldpass_profile" => "required",
            "newpass_profile" => "required",
            "confirmpass_profile" => "required:newpass_profile"
        ], [
            "required" => "This field is required",
            "same:newpass_profile" => "Confirm password must as same as password"
        ]);
        $passlama = $request->input('oldpass_profile');
        if (password_verify($passlama, $user_login->password)) {
            $passbaru = $request->input('newpass_profile');
            $affected = DB::table('user')
            ->where('id_user', $user_login->id_user)
            ->update(['password'=> password_hash($passbaru, PASSWORD_BCRYPT)]);
            if ($affected){
                $request->session()->forget('user-login');
                $users = User::all();
                foreach ($users as $user) {
                    if ($user->id_user == $user_login->id_user) {
                        $request->session()->put('user-login', $user);
                        return redirect()->action('ProfileController@landing')->with([
                            "success" => "Password Update Success!"
                        ]);
                    }
                }
            } 
        }
        else {
            return redirect()->action('ProfileController@landing')->with([
                "warning" => "Wrong password!"
            ]);
        }
    }
}
