<?php

namespace App\Http\Controllers;

use App\Models\Models\Menu;
use App\Models\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function landing(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        // Get promo
        $promos = Promo::take(4)->get();

        // Get most popular
        $popular = Menu::orderBy('click', 'desc')->take(4)->get();

        return view('user.menu.landing', [
            "user" => $user_login,
            'populars' => $popular,
            "promos" => $promos
        ]);
    }

    public function promos(Request $request, $id = 1)
    {
        $user_login = $request->session()->get('user-login');

        // Get dessert menus
        $promos = Promo::all();

        // Pagination
        $pagination = (object)[
            "total" => ceil(count($promos)/8),
            "page" => $id
        ];

        $final_promos = Promo::skip(8*($id-1))->take(8)->get();

        return view('user.promo.main', [
            "user" => $user_login,
            "promos" => $final_promos,
            "pagination" => $pagination
        ]);
    }

    public function promoDetail(Request $request, $id)
    {
        $user_login = $request->session()->get('user-login');

        // Get promo by id
        $promo = Promo::where('id_promo', $id)->first();

        // Split syarat promo
        $syarat = explode(', ', $promo->syarat_promo);

        return view('user.promo.detail', [
            "user" => $user_login,
            "detail_type" => "promo",
            "promo" => $promo,
            "syarat" => $syarat
        ]);
    }

    public function desserts(Request $request, $id = 1)
    {
        $user_login = $request->session()->get('user-login');

        // Get dessert menus
        $desserts = Menu::where('jenis', 'dessert')->where('stock', '>', 0)->get();

        // Pagination
        $pagination = (object)[
            "total" => ceil(count($desserts)/8),
            "page" => $id
        ];

        $final_desserts = Menu::where('jenis', 'dessert')->where('stock', '>', 0)->skip(8*($id-1))->take(8)->get();

        return view('user.menu.dessert', [
            "user" => $user_login,
            "desserts" => $final_desserts,
            "pagination" => $pagination
        ]);
    }

    public function main_dishes(Request $request, $id = 1)
    {
        $user_login = $request->session()->get('user-login');

        // Get main dish menus
        $main_dishes = Menu::where('jenis', 'main dish')->where('stock', '>', 0)->get();

        // Pagination
        $pagination = (object)[
            "total" => ceil(count($main_dishes)/8),
            "page" => $id
        ];

        $final_main_dishes = Menu::where('jenis', 'main dish')->where('stock', '>', 0)->skip(8*($id-1))->take(8)->get();

        return view('user.menu.main-dish', [
            "user" => $user_login,
            "main_dishes" => $final_main_dishes,
            "pagination" => $pagination
        ]);
    }
    public function drinks(Request $request, $id = 1)
    {
        $user_login = $request->session()->get('user-login');

        // Get drink menus
        $drinks = Menu::where('jenis', 'drink')->where('stock', '>', 0)->get();

        // Pagination
        $pagination = (object)[
            "total" => ceil(count($drinks)/8),
            "page" => $id
        ];

        $final_drinks = Menu::where('jenis', 'drink')->where('stock', '>', 0)->skip(8*($id-1))->take(8)->get();

        return view('user.menu.drink', [
            "user" => $user_login,
            "drinks" => $final_drinks,
            "pagination" => $pagination
        ]);
    }

    public function menuDetail(Request $request, $id)
    {
        $user_login = $request->session()->get('user-login');

        // Get menu by id
        $menu = Menu::where('id_barang', $id)->first();
        $menu->click += 1;
        $menu->save();

        return view('user.menu.detail', [
            "user" => $user_login,
            "detail_type" => $menu->jenis,
            "menu" => $menu
        ]);
    }
}

