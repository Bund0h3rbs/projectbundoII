<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersHakAksesController extends Controller
{
    protected $folder = 'admin.users_hakakses';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $with['title_header'] = "Hak Akses Pengguna";
        return view($this->folder.'.index',$with);
    }

}
