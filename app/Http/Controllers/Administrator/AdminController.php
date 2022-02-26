<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $folder = 'users';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $with['title_header'] = "Dashboard";
        return view($this->folder.'.index',$with);
    }

    

}
