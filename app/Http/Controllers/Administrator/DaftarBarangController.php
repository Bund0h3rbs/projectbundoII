<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Aksesrole;
class DaftarBarangController extends Controller
{
    protected $folder = 'admin.masterProduk.daftar_brg';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();
        if ($cekAkses == true) {
            $with['title_header'] = "Daftar Barang";
            $data['table'] = "table_default";

            return view($this->folder.'.index',$with);
        }else{
            return redirect('/home');
        }
    }

}
