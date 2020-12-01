<?php

namespace App\Http\Controllers;

use App\Models\Models\Address;
use App\Models\Models\Cart;
use App\Models\Models\Dtrans;
use App\Models\Models\Htrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransController extends Controller
{
    public function showHistory(Request $request)
    {
        $user_login = $request->session()->get('user-login');
        $user_trans = Htrans::where('id_user', $user_login->id_user)->get();

        return view('user.history', [
            'user' => $user_login,
            'trans' => $user_trans
        ]);
    }

    public function checkout(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        $id = "TR";
        $row = DB::select('select nvl(max(substr(id_trans,3,3)),0) + 1 as num from htrans where substr(id_trans, 1, 2) = ?', [$id]);
        $id .= str_pad(strval($row[0]->num), 3, '0', STR_PAD_LEFT);

        if ($user_login == null) {
            $carts = $request->session()->get('carts');
            $addresses = $request->session()->get('address');

            if ($addresses != null) {
                $address = null;
                $total = 0;

                foreach ($addresses as $item) {
                    if ($item->status == 1) {
                        $address = $item;
                    }
                }

                if ($address != null) {
                    foreach ($carts as $cart) {
                        $total += $cart->subtotal;
                    }

                    Htrans::create([
                        'id_trans' => $id,
                        'id_user' => 'guest',
                        'jalan' => $address->jalan,
                        'kota' => $address->City->id_kota,
                        'penerima' => $address->penerima,
                        'telp' => $address->telp,
                        'diskon' => $request->discount,
                        'total' => $total
                    ]);

                    foreach ($carts as $item) {
                        Dtrans::create([
                            'id_htrans' => $id,
                            'id_barang' => $item->id_barang,
                            'quantity' => $item->qty,
                            'subtotal' => $item->subtotal
                        ]);
                    }

                    $request->session()->forget('carts');

                    return 'ok';
                } else {
                    return 'Tidak ada alamat yang dipilih';
                }
            } else {
                return 'Tidak ada alamat yang dipilih';
            }
        } else {
            $carts = Cart::where('id_user', $user_login->id_user)->get();
            $address = Address::where('id_user', $user_login->id_user)->where('status', 1)->first();
            $total = 0;

            if ($address != null) {
                foreach ($carts as $item) {
                    $total += $item->Barang->harga *  $item->quantity;
                }

                Htrans::create([
                    'id_trans' => $id,
                    'id_user' => $user_login->id_user,
                    'jalan' => $address->jalan,
                    'kota' => $address->kota,
                    'penerima' => $address->penerima,
                    'telp' => $address->telp,
                    'diskon' => $request->discount,
                    'total' => $total
                ]);

                foreach ($carts as $item) {
                    Dtrans::create([
                        'id_htrans' => $id,
                        'id_barang' => $item->id_barang,
                        'quantity' => $item->quantity,
                        'subtotal' => $item->Barang->harga *  $item->quantity
                    ]);
                }

                Cart::where('id_user', $user_login->id_user)->delete();

                return 'ok';
            } else {
                return 'Tidak ada alamat yang dipilih';
            }
        }
    }

    public function confirm(Request $request)
    {

    }

    public function reject(Request $request)
    {

    }

    public function cancel(Request $request)
    {

    }
}
