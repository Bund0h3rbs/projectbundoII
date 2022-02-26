<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KlienController extends Controller
{
    protected $folder = 'admin.klien';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $with['title_header'] = "Daftar Klien";
        return view($this->folder.'.index',$with);
    }


    public function getlist(Request $request)
    {
        $klien = [];
        if(isset($request->id)){

        }
        $with['title'] = "Form Klien";
        $with['datas'] = $klien;
        return view($this->folder.'.listData',$with);
    }
    public function clientAdd(Request $request)
    {
        $klien = [];
        if(isset($request->id)){

        }

        $with['title'] = "Form Klien";
        $with['datas'] = $klien;
        return view($this->folder.'.formAdd',$with);
    }


}
