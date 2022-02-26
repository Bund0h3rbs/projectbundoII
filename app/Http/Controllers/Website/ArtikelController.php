<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {

        return view($this->folder.'.artikel');
    }

   

}
