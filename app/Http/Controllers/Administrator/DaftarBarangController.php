<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarBarangController extends Controller
{
    protected $folder = 'admin.masterProduk.daftar_brg';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $with['title_header'] = "Daftar Barang";
        return view($this->folder.'.index',$with);
    }

}
