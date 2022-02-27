<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Aksesrole;
class TypeBarangController extends Controller
{
    protected $folder = 'admin.masterProduk.type_brg';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();
        if ($cekAkses == true) {
            $with['title_header'] = "Referensi Barang";
            $data['table'] = "table_default";

            return view($this->folder.'.index',$with);
        }else{
            return redirect('/home');
        }
    }

}
