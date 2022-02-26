<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeBarangController extends Controller
{
    protected $folder = 'admin.masterProduk.type_brg';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $with['title_header'] = "Tipe Barang";
        return view($this->folder.'.index',$with);
    }

}
