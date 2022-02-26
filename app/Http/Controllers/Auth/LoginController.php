<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $folder = "login";


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function create()
    {
        return view($this->folder.'.login');
    }

   
}
