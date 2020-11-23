<?php

namespace App\Http\Controllers;

use App\Models\Models\Address;
use App\Models\Models\City;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function listAddresses(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        $addresses = [];
        if ($user_login == null) {
            if ($request->session()->has('address')) {
                $addresses = $request->session()->get('address');
            }
        } else {
            $addresses = Address::where('id_user', $user_login->id_user)->get();
        }

        return view('user.cart.list-address', [
            'user' => $user_login,
            'addresses' => $addresses
        ]);
    }

    public function setActive(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        if ($user_login != null) {
            // Set old status
            $selected = Address::where('id_user', $user_login->id_user)->where('status', 1)->first();
            $selected->status = 0;
            $selected->save();

            // Set new status
            $selected = Address::find($request->id);
            $selected->status = 1;
            $selected->save();
        } else {
            $address = $request->session()->get('address');

            foreach ($address as $item) {
                if ($item->status == 1) {
                    $item->status = 0;
                }
            }

            foreach ($address as $item) {
                if ($item->id == $request->id) {
                    $item->status = 1;
                }
            }
        }
        return redirect('cart');
    }

    public function showForm(Request $request)
    {
        $cities = City::orderBy('nama')->get();

        if ($request->id == 'new') {
            // New
            return view('user.cart.form-address', [
                'cities' => $cities,
                'value' => null,
                'type' => 'new'
            ]);
        } else {
            // Edit
            if ($request->session()->has('user-login')) {
                $selectedAddress = Address::find($request->id);
            } else {
                $allAddress = $request->session()->get('address');
                foreach ($allAddress as $item) {
                    if ($item->id == $request->id) {
                        $selectedAddress = $item;
                    }
                }
            }
            return view('user.cart.form-address', [
                'cities' => $cities,
                'value' => $selectedAddress,
                'type' => $request->id
            ]);
        }
    }

    public function editAddress(Request $request)
    {
        $user_login = $request->session()->get('user-login');

        if ($request->id == 'new') {
            if ($user_login != null) {
                Address::create([
                    'id_user' => $user_login->id_user,
                    'kota' => $request->kota,
                    'jalan' => $request->alamat,
                    'kodepos' => $request->kodepos,
                    'penerima' => $request->penerima,
                    'telp' => $request->telp
                ]);
                return 'ok';
            } else {
                $address = $request->session()->get('address');
                if ($address == null) $address = [];

                $city = City::find($request->kota);

                $address[] = (object)[
                    'id' => count($address) + 1,
                    'kota' => $request->kota,
                    'jalan' => $request->alamat,
                    'kodepos' => $request->kodepos,
                    'penerima' => $request->penerima,
                    'telp' => $request->telp,
                    'status' => 0,
                    'City' => $city
                ];

                $request->session()->put('address', $address);

                return 'ok';
            }
        } else {
            if ($user_login != null) {
                $address = Address::find($request->id);
                $address->kota = $request->kota;
                $address->jalan = $request->alamat;
                $address->kodepos = $request->kodepos;
                $address->penerima = $request->penerima;
                $address->telp = $request->telp;
                $address->save();

                return 'ok';
            } else {
                $address = $request->session()->get('address');

                $city = City::find($request->kota);

                foreach ($address as $item) {
                    if ($item->id == $request->id) {
                        $item->kota = $request->kota;
                        $item->jalan = $request->alamat;
                        $item->kodepos = $request->kodepos;
                        $item->penerima = $request->penerima;
                        $item->telp = $request->telp;
                        $item->City = $city;
                    }
                }

                return 'ok';
            }
        }
    }
}
