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
        $with['title_header'] = "Dasboard";
        return view($this->folder.'.index',$with);
    }

}
