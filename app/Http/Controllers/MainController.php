<?php

namespace App\Http\Controllers;

use App\Models\Models\Menu;
use Illuminate\Http\Request;
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

    public function desserts($id = 1)
    {
        $user_login = json_decode(Cookie::get('user-login'));

        // Get dessert menus
        $desserts = Menu::where('jenis', 'dessert')->where('stock', '>', 0)->get();

        // Pagination
        $pagination = (object)[
            "total" => ceil(count($desserts)/8),
            "page" => $id
        ];

        $final_desserts = Menu::where('jenis', 'dessert')->where('stock', '>', 0)->skip(8*($id-1)+1)->take(8)->get();

        return view('user.dessert', [
            "user" => $user_login,
            "desserts" => $final_desserts,
            "pagination" => $pagination
        ]);
    }

    public function main_dishes($id = 1)
    {
        $user_login = json_decode(Cookie::get('user-login'));

        // Get main dish menus
        $main_dishes = Menu::where('jenis', 'main dish')->where('stock', '>', 0)->get();

        // Pagination
        $pagination = (object)[
            "total" => ceil(count($main_dishes)/8),
            "page" => $id
        ];

        $final_main_dishes = Menu::where('jenis', 'main dish')->where('stock', '>', 0)->skip(8*($id-1)+1)->take(8)->get();

        return view('user.main-dish', [
            "user" => $user_login,
            "main_dishes" => $final_main_dishes,
            "pagination" => $pagination
        ]);
    }
    public function drinks($id = 1)
    {
        $user_login = json_decode(Cookie::get('user-login'));

        // Get drink menus
        $drinks = Menu::where('jenis', 'drink')->where('stock', '>', 0)->get();

        // Pagination
        $pagination = (object)[
            "total" => ceil(count($drinks)/8),
            "page" => $id
        ];

        $final_drinks = Menu::where('jenis', 'drink')->where('stock', '>', 0)->skip(8*($id-1)+1)->take(8)->get();

        return view('user.drink', [
            "user" => $user_login,
            "drinks" => $final_drinks,
            "pagination" => $pagination
        ]);
    }
}

