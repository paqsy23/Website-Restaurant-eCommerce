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
        $user_login = $request->session()->get('user-login');

        $menu = Menu::find($request->id_barang);

        if ($user_login == null) {
            // Guest
            $userCart = $request->session()->get('carts');
            if ($userCart == null) $userCart = [];

            $check = false;
            foreach ($userCart as $cart) {
                if ($cart->id_barang == $request->id_barang) {
                    $check = true;
                    $cart->qty += intval($request->qty);
                    $cart->subtotal += $menu->harga * intval($request->qty);
                }
            }

            if (!$check) {
                $userCart[] = (object)[
                    'id_barang' => $request->id_barang,
                    'nama' => $menu->nama,
                    'jenis' => $menu->jenis,
                    'harga' => $menu->harga,
                    'qty' => intval($request->qty),
                    'pesan' => '',
                    'subtotal' => $menu->harga * intval($request->qty)
                ];
                $request->session()->put('carts', $userCart);
            }
        } else {
            // Registered User
            $cart = Cart::where('id_user', $user_login->id_user)->where('id_barang', $request->id_barang)->first();

            if ($cart == null) {
                Cart::create([
                    'id_user' => $user_login->id_user,
                    'id_barang' => $request->id_barang,
                    'quantity' => $request->qty,
                ]);
            } else {
                $cart->quantity += $request->qty;
                $cart->save();
            }
        }

        return back();
    }

    public function cart(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        $userCart = [];

        if ($user_login == null) {
            // Guest
            $userCart = $request->session()->get('carts');
            if ($userCart == null) $userCart = [];
        } else {
            // Registered User
            $carts = Cart::where('id_user', $user_login->id_user)->get();

            $userCart = [];
            foreach ($carts as $cart) {
                $menu = Menu::find($cart->id_barang);

                $userCart[] = (object)[
                    'id_barang' => $cart->id_barang,
                    'nama' => $menu->nama,
                    'jenis' => $menu->jenis,
                    'harga' => $menu->harga,
                    'qty' => $cart->quantity,
                    'pesan' => $cart->pesan,
                    'subtotal' => $menu->harga * $cart->quantity
                ];
            }
        }

        // Get most popular
        $popular = Menu::orderBy('click', 'desc')->take(4)->get();

        return view('user.cart.main', [
            'user' => $user_login,
            'carts' => $userCart,
            'populars' => $popular
        ]);
    }

    public function decreaseCart(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        if ($user_login == null) {
            $carts = $request->session()->get('carts');

            foreach ($carts as $cart) {
                if ($cart->id_barang == $request->id) {
                    $cart->qty -= 1;
                }
            }
        } else {
            $cart = Cart::where('id_user', $user_login->id_user)->where('id_barang', $request->id)->first();
            $cart->quantity -= 1;
            $cart->save();
        }
    }

    public function increaseCart(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        if ($user_login == null) {
            $carts = $request->session()->get('carts');

            foreach ($carts as $cart) {
                if ($cart->id_barang == $request->id) {
                    $cart->qty += 1;
                }
            }
        } else {
            $cart = Cart::where('id_user', $user_login->id_user)->where('id_barang', $request->id)->first();
            $cart->quantity += 1;
            $cart->save();
        }
    }

    public function deleteItem(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        if ($user_login == null) {
            $carts = $request->session()->get('carts');
            $newCarts = [];

            foreach ($carts as $cart) {
                if ($cart->id_barang != $request->id_barang) {
                    $newCarts[] = $cart;
                }
            }

            $request->session()->put('carts', $newCarts);
        } else {
            Cart::where('id_user', $user_login->id_user)->where('id_barang', $request->id_barang)->delete();
        }
    }
}
