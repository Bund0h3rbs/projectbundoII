<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {

        return view($this->folder.'.produk');
    }



}
