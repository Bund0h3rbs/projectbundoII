<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AwalController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {

        return view($this->folder.'.index');
    }

    public function detail_product(Request $request)
    {

        return view($this->folder.'.detail_product');
    }

}
