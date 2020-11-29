<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
use App\Models\Models\Htrans;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller{
        public function adminLanding(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $trans = Htrans::all();
            return view('admin_page', [
                'trans' => $trans
            ]);
        }
        public function page_insertMakanan(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $kategori = DB::select('select * from kategori');
            return view('makanan.insertMakanan', ["kategori"=>$kategori]);
        }
        public function insertMakanan(Request $request){
            $this->validate($request, [
                'nama_makanan' => 'required',
                'kategori_makanan' => 'required',
                'jenis_makanan' => 'required',
                'stock_makanan' => 'required|integer',
                'harga_makanan' => 'required|integer',
                'berat_makanan' => 'required|integer',
                'deskripsi' => 'required'
            ]);
            $nama_makanan = $request->input('nama_makanan');
            $nama_kategori = $request->input('kategori_makanan');
            $jenis_makanan = $request->input('jenis_makanan');
            $stock_makanan = $request->input('stock_makanan');
            $harga_makanan = $request->input('harga_makanan');
            $berat_makanan = $request->input('berat_makanan');
            $deskripsi = $request->input('deskripsi');
            $id_kategori = substr($nama_kategori,0,5);
            $id = "MA";
            $row = DB::select('select nvl(max(substr(id_barang,3,3)),0) + 1 as num from barang where substr(id_barang, 1, 2) = ?', [$id]);
            if ($row[0]->num < 10) {
                $id .= '00' . $row[0]->num;
            }
            else if ($row[0]->num <100) {
                $id .= '0' . $row[0]->num;
            }
            else {
                $id .= $row[0]->num;
            }
            $row = DB::table('barang')
            ->insert(['id_barang' => $id, 'id_kategori' => $id_kategori, 'nama' => $nama_makanan, 'stock' => $stock_makanan, 'deskripsi' => $deskripsi, 'harga' => $harga_makanan, 'berat (gr)'=>$berat_makanan, 'click'=>"0", 'jenis'=>$jenis_makanan]);
            if ($row){
                echo $id_kategori;
                return redirect()->action('AdminController@page_insertMakanan');
            }
        }
        public function page_listMakanan(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $makanan = DB::select('select * from barang, kategori where barang.id_kategori = kategori.id_kategori');
            return view('makanan.listMakanan', ['makanan'=>$makanan]);
        }
        public function editMakanan(Request $request, $id_barang)
        {
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $makanan = DB::table('barang')
            ->where("id_barang", $id_barang)->first();
            return view("makanan.updateMakanan", compact("makanan"));
        }
        public function page_updateMakanan(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $makanan = DB::select('select * from barang');
            return view('makanan.updateMakanan', ['makanan'=>$makanan]);
        }
        public function updateMakanan(Request $request, $id_barang){
            $this->validate($request, [
                'nama_makanan' => 'required',
                'stock_makanan'=> 'required',
                'harga_makanan' => 'required',
                'berat_makanan' => 'required',
                'deskripsi' => 'required'
            ]);
            $nama_makanan = $request->input('nama_makanan');
            $stock_makanan = $request->input('stock_makanan');
            $harga_makanan = $request->input('harga_makanan');
            $berat_makanan = $request->input('berat_makanan');
            $deskripsi = $request->input('deskripsi');
            $affected = DB::table('barang')
            ->where('id_barang', $id_barang)
            ->update(['nama'=> $nama_makanan, 'stock'=>$stock_makanan, 'harga'=>$harga_makanan, 'berat (kg)'=>$berat_makanan, 'deskripsi'=>$deskripsi]);
            if ($affected){
                $makanan = DB::select('select * from barang, kategori where barang.id_kategori = kategori.id_kategori');
                return view('makanan.listMakanan', ['makanan'=>$makanan]);
            }
        }
        public function deleteMakanan($id_barang){
            $makanan = DB::table('barang')->where('id_barang', $id_barang)->delete();
            if ($makanan){
                return redirect()->action('AdminController@page_listMakanan');
            }
        }


        //Kategori
        public function page_insertKategori(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            return view('kategori.insertKategori');
        }

        public function insertKategori(Request $request){
            $this->validate($request, [
                'nama_kategori' => 'required'
            ]);
            $nama_kategori = $request->input('nama_kategori');
            $id = "KA";
            $row = DB::select('select nvl(max(substr(id_kategori,3,3)),0) + 1 as num from kategori where substr(id_kategori, 1, 2) = ?', [$id]);
            if ($row[0]->num < 10) {
                $id .= '00' . $row[0]->num;
            }
            else if ($row[0]->num <100) {
                $id .= '0' . $row[0]->num;
            }
            else {
                $id .= $row[0]->num;
            }
            $row = DB::table('kategori')
            ->insert(['id_kategori' => $id, 'nama' => $nama_kategori]);
            if ($row){
                return redirect()->action('AdminController@page_insertKategori');
            }
        }

        public function page_updateKategori(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $kategori = DB::select('select * from kategori');
            return view('kategori.updateKategori', ["kategori" => $kategori]);
        }
        public function updateKategori(Request $request, $id_kategori){
            $this->validate($request, [
                'nama_kategori' => 'required'
            ]);
            $nama_kategori = $request->input('nama_kategori');
            $affected = DB::table('kategori')
            ->where('id_kategori', $id_kategori)
            ->update(['nama'=> $nama_kategori]);

            if ($affected){
                $kategori = DB::select('select * from kategori');
                return view('kategori.listKategori', ["kategori" => $kategori]);
            }
        }

        public function edit(Request $request, $id_kategori)
        {
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $kategori = DB::table('kategori')
            ->where("id_kategori", $id_kategori)->first();
            return view("kategori.updateKategori", compact("kategori"));
        }
        public function page_listKategori(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $kategori = DB::select('select * from kategori');
            return view('kategori.listKategori', ["kategori" => $kategori]);
        }

        public function deleteKategori($id_kategori){
            $makanan = DB::table('barang')
            ->where("id_kategori", $id_kategori)
            ->update((['id_kategori'=>null]));

            $kategori = DB::table('kategori')->where('id_kategori', $id_kategori)->delete();

            if ($kategori){
                return redirect()->action('AdminController@page_listKategori');
            }
        }

        //Promo
        public function page_insertPromo(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            return view('promo.insertPromo');
        }
        public function insertPromo(Request $request){
            $this->validate($request, [
                'nama_promo' => 'required',
                'potongan_harga' => 'required',
                'detail' => 'required',
                'syarat_promo' => 'required',
                'kategori_promo' => 'required',
                'minimal_transaksi' => 'required'
            ]);
            $nama_promo = $request->input('nama_promo');
            $potongan_harga = $request->input('potongan_harga');
            $detail = $request->input('detail');
            $syarat_promo = $request->input('syarat_promo');
            $minimal_transaksi = $request->input('minimal_transaksi');
            $kategori_promo = $request->input('kategori_promo');
            if ($kategori_promo != "new user") {
                $kategori_promo = $request->input('jenis_kategori');
            }
            $id = "PR";
            $row = DB::select('select nvl(max(substr(id_promo,3,3)),0) + 1 as num from promo where substr(id_promo, 1, 2) = ?', [$id]);
            if ($row[0]->num < 10) {
                $id .= '00' . $row[0]->num;
            }
            else if ($row[0]->num <100) {
                $id .= '0' . $row[0]->num;
            }
            else {
                $id .= $row[0]->num;
            }
            $row = DB::table('promo')
            ->insert(['id_promo' => $id, 'nama_promo' => $nama_promo, 'potongan_harga' => $potongan_harga, 'detail' => $detail, 'syarat_promo' => $syarat_promo, 'kategori_promo' => $kategori_promo, 'minimal' => $minimal_transaksi]);
            if ($row){
                return redirect()->action('AdminController@page_insertPromo');
            }
        }
        public function page_listPromo(Request $request){
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $promo = DB::select('select * from promo');
            return view('promo.listPromo', ["promo" => $promo]);
        }
        public function editPromo(Request $request, $id_promo)
        {
            $user_login = $request->session()->get('user-login');
            if ($user_login->id_user != 'admin') return redirect('/');

            $promo = DB::table('promo')
            ->where("id_promo", $id_promo)->first();
            return view("promo.updatePromo", compact("promo"));
        }
        public function updatePromo(Request $request, $id_promo){
            $this->validate($request, [
                'nama_promo' => 'required',
                'potongan_harga' => 'required',
                'detail' => 'required',
                'syarat_promo' => 'required'
            ]);
            $nama_promo = $request->input('nama_promo');
            $potongan_harga = $request->input('potongan_harga');
            $detail = $request->input('detail');
            $syarat_promo = $request->input('syarat_promo');
            $affected = DB::table('promo')
            ->where('id_promo', $id_promo)
            ->update(['nama_promo'=> $nama_promo, 'potongan_harga' => $potongan_harga, 'detail' => $detail, 'syarat_promo' => $syarat_promo]);

            if ($affected){
                $promo = DB::select('select * from promo');
                return view('promo.listPromo', ["promo" => $promo]);
            }
        }
        public function deletePromo($id_promo){
            $promo = DB::table('promo')->where('id_promo', $id_promo)->delete();
            if ($promo){
                return redirect()->action('AdminController@page_listPromo');
            }
        }
    }
?>
