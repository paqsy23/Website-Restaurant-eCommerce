<?php

namespace App\Http\Controllers;

use App\Models\Models\Address;
use App\Models\Models\Cart;
use App\Models\Models\Menu;
use App\Models\Models\Promo;
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
        $promo = [];
        $totalHarga = 0;
        $address = null;

        if ($user_login == null) {
            // Guest
            $userCart = $request->session()->get('carts');
            if ($userCart == null) $userCart = [];

            foreach ($userCart as $cart) {
                $totalHarga += $cart->subtotal;
            }

            // Get Address
            $allAddress = $request->session()->get('address');

            foreach ($allAddress as $item) {
                if ($item->status == 1) {
                    $address = $item;
                }
            }
        } else {
            // Registered User
            $carts = Cart::where('id_user', $user_login->id_user)->get();

            $userCart = [];
            $jenis = "";
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

                $totalHarga += $menu->harga * $cart->quantity;

                if ($jenis == "") {
                    $jenis = $menu->jenis;
                } else if ($jenis != $menu->jenis) {
                    $jenis = null;
                }
            }

            // Get Available Promos
            $promo = Promo::where('kategori_promo', 'all');
            if ($jenis != null) {
                $promo = $promo->orWhere('kategori_promo', $jenis);
            }
            $promo = $promo->get();

            // Get Active Address
            $address = Address::where('status', 1)->where('id_user', $user_login->id_user)->first();
        }

        // Get most popular
        $popular = Menu::orderBy('click', 'desc')->take(4)->get();

        return view('user.cart.main', [
            'user' => $user_login,
            'carts' => $userCart,
            'populars' => $popular,
            'totalHarga' => $totalHarga,
            'promos' => $promo,
            'address' => $address
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
