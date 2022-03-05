<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Artikel;
use App\Models\Artikel_category;
use App\Models\Artikel_viewer;
class ArtikelController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {
        $artikel_new   = Artikel::where('active',1)->orderBy('id','DESC')->limit(3)->get();
        foreach($artikel_new as $new){
            $new_artikel[$new->id] = $new->id;
        }
        $artikel_next  = Artikel::where('active',1)->orderBy('id','DESC')->limit(5,10)->get();
        $artikel_right = Artikel::whereNotIn('id',$new_artikel)->where('active',1)->orderBy('id','DESC')->limit(5)->get();
        $artikel_category = Artikel_category::where('active',1)->orderBy('id','DESC')->get();

        $with['artikel_new']      = $artikel_new;
        $with['artikel_category'] = $artikel_category;
        $with['artikel_right']    = $artikel_right;
        return view($this->folder.'.artikel',$with);
    }



}
