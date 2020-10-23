<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;

    class AdminController extends Controller{
        public function page_insertMakanan(){
            return view('makanan.insertMakanan');
        }
        public function page_updateMakanan(){
            return view('makanan.updateMakanan');
        }
        public function page_deleteMakanan(){
            return view('makanan.deleteMakanan');
        }
    }
?>
