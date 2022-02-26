<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {

        return view($this->folder.'.contact');
    }



}
