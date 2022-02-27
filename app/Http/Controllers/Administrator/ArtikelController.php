<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Tabel & view
use App\Libs\Aksesrole;
use App\Models\Artikel_category;

class ArtikelController extends Controller
{
    protected $folder = 'admin.artikel.news';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();

        if ($cekAkses == true) {
            $data['title_header'] = "Artikel";
            $data['table'] = "table_default";

            return view($this->folder.'.index', $data);

        }else{
            return redirect('/home');
        }

    }
}
