<?php

namespace App\Http\Controllers;

use App\Models\Models\Address;
use App\Models\Models\Cart;
use App\Models\Models\Dtrans;
use App\Models\Models\Htrans;
use App\Models\Models\Menu;
use App\Models\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransController extends Controller
{
    public function showHistory(Request $request)
    {
        $user_login = $request->session()->get('user-login');
        $user_trans = Htrans::where('id_user', $user_login->id_user)->get();

        return view('user.history.main', [
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

    public function action(Request $request)
    {
        $trans = Htrans::find($request->id_trans);

        if ($request->has('detail')) {
            return redirect('trans/detail/'.$request->id_trans);
        } else if ($request->has('cancel')) {
            $trans->status = -2;
            $trans->save();
        } else if ($request->has('reject')) {
            $trans->status = -1;
            $trans->save();
        } else if ($request->has('approve')) {
            $available = true;

            foreach ($trans->Dtrans as $dtrans) {
                if ($dtrans->Menu->stock - $dtrans->quantity < 0) {
                    $available = false;
                }
            }

            if ($available) {
                foreach ($trans->Dtrans as $dtrans) {
                    $selected = Menu::find($dtrans->id_barang);

                    $selected->stock -= $dtrans->quantity;
                    $selected->save();
                }

                $trans->status = 1;
                $trans->save();
            } else {
                $request->session()->flash('message', 'Salah satu menu tidak memiliki stok yang cukup');
            }
        }

        return back();
    }

    public function showDetail(Request $request)
    {
        $selected = Htrans::find($request->id);
        $user_login = $request->session()->get('user-login');
        $review = review::where("id_user",$user_login->id_user)->get();

        // dd($review);

        return view('user.history.detail', [
            'user' => $user_login,
            'htrans' => $selected,
            'review' => $review,
            'trans' => $selected->Dtrans
        ]);
    }

    public function submitReview(Request $req)
    {
        $pesan = "";
        if ($req->input("pesan")!=null) {
            $pesan = $req->input("pesan");
        }
        $reviews = [
            "id_user"=>$req->input("id_user"),
            "id_barang"=>$req->input("id_barang"),
            "id_dtrans"=>$req->input("id_dtrans"),
            "rating"=>$req->input("rating"),
            "pesan"=>$pesan,
        ];
        // dd($reviews);
        $temp = review::where("id_user",$req->input("id_user"))->where("id_barang",$req->input("id_barang"))->where("id_dtrans",$req->input("id_dtrans"))->get();
        // dd(count($temp));
        if (count($temp)>0) {
            $review = review::where("id_review",$temp[0]->id_review)->update(["rating"=>$req->input("rating"),
            "pesan"=>$pesan,]);
        }else{
           $review = review::create($reviews);
        }
        return redirect("http://127.0.0.1:8000/trans/detail/".$req->input("id_transaksi"));


    }
}
