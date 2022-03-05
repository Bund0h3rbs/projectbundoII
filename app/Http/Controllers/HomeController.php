<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $folder = 'admin';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roleAkses = new \App\Libs\Aksesrole;

        $cekAkses = $roleAkses->getAkses();
        if ($cekAkses == true) {
            $with['title_header'] = "Dashboard";
            return view($this->folder.'.index',$with);
        }

        // redirect()->logout();

    }

}
