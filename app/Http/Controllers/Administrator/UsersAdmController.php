<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersAdmController extends Controller
{
    protected $folder = 'admin.users';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $with['title_header'] = "User / Pengguna";
        return view($this->folder.'.index',$with);
    }

}
