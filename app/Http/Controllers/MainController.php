<?php

namespace App\Http\Controllers;

use App\Models\Models\Menu;
use App\Models\Models\Promo;
use App\Models\Models\review;
use App\Models\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $review = review::where("id_barang",$id)->get();
        $rate = 0;
        foreach ($review as $key => $rev) {
            $rate=$rate+$rev->rating;
        }
        $rate = $rate/count($review);
        $rate = round($rate,1);
        $users = User::all();
        // dd($rate);

        return view('user.menu.detail', [
            "user" => $user_login,
            "detail_type" => $menu->jenis,
            "menu" => $menu,
            "review" => $review,
            "rate" => $rate,
            "users" => $users,
        ]);
    }

    public function search(Request $request){
        $user_login = $request->session()->get('user-login');

        $nama_barang = $request->name;
        $makanan = Menu::where("nama", 'like', '%' . $nama_barang . '%')->get();
        // $makanan = DB::table('barang')
        // ->where("nama", 'like', '%' . $nama_barang . '%')->first();
        $kategori = DB::table('kategori')->select('nama')->groupBy('nama')->get();
        $makanan1 = DB::table('barang')->select('jenis')->groupBy('jenis')->get();

        //$popular = Menu::orderBy('click', 'desc')->take(4)->get();
        return view('templates.search', [
            "user" => $user_login,
            #'populars' => $popular,
            'nama_barang' => $nama_barang,
            'makanans' => $makanan,
            'makanans1' => $makanan1,
            'kategoris' => $kategori
        ]);
    }

    public function filter(Request $request, $nama_barang){
        $user_login = $request->session()->get('user-login');
        $filter = $request->language;
        $nama_barang;
        $makanan = DB::table('barang')->select('barang.nama', 'barang.harga', 'barang.jenis', 'barang.id_barang', 'barang.id_kategori')
        ->where('barang.nama', 'like', '%' . $nama_barang . '%')
        ->Join('kategori', 'barang.id_kategori', '=','kategori.id_kategori')->whereIn('jenis', $filter)->orwhereIn('kategori.nama', $filter)
        ->where('barang.nama', 'like', '%' . $nama_barang . '%')
        ->get();
        $kategori = DB::table('kategori')->select('nama')->groupBy('nama')->get();
        $makanan1 = DB::table('barang')->select('jenis')->groupBy('jenis')->get();
        return view('templates.search', [
            "user" => $user_login,
            #'populars' => $popular,
            'nama_barang' => $nama_barang,
            'makanans' => $makanan,
            'makanans1' => $makanan1,
            'kategoris' => $kategori
        ]);
        //var_dump($filter);
        // return view('templates.search', [
        //     "user" => $user_login
        // ]);
    }
}

