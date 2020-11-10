<?php

namespace App\Http\Controllers;

use App\Models\Models\Cart;
use App\Models\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $user_login = json_decode(Cookie::get('user-login'));

        $menu = Menu::find($request->id_barang);

        if ($user_login == null) {
            // Guest
            $userCart = Cookie::get('carts');
            if ($userCart == null) $userCart = [];
            else $userCart = json_decode($userCart);

            $userCart[] = [
                'id_barang' => $request->id_barang,
                'nama' => $menu->nama,
                'harga' => $menu->harga,
                'qty' => $request->qty,
                'pesan' => ''
            ];

            Cookie::queue('carts', json_encode($userCart));
        } else {
            // Registered User
            Cart::create([
                'id_user' => $user_login->id_user,
                'id_barang' => $request->id_barang,
                'quantity' => $request->qty,
            ]);
        }

        return back();
    }

    public function cart()
    {
        $user_login = json_decode(Cookie::get('user-login'));

        if ($user_login == null) {
            // Guest
            $userCart = Cookie::get('carts');
            if ($userCart == null) $userCart = [];
            else $userCart = json_decode($userCart);

            dd($userCart);
        } else {
            // Registered User
            $carts = Cart::where('id_user', $user_login->id_user)->get();

            $userCart = [];
            foreach ($carts as $cart) {
                $menu = Menu::find($cart->id_barang);

                $userCart[] = [
                    'id_barang' => $cart->id_barang,
                    'nama' => $menu->nama,
                    'harga' => $menu->harga,
                    'qty' => $cart->quantity,
                    'pesan' => $cart->pesan
                ];
            }

            dd($userCart);
        }
    }
}
