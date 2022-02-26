<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $folder = 'users';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view($this->folder.'.index');
    }

}
