<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinusController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {

        return view($this->folder.'.joinus');
    }



}
