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

        $artikel_right = Artikel::whereNotIn('id',$new_artikel)->where('active',1)->orderBy('id','DESC')->limit(5)->get();

        $with = $this->artikelComponen();
        $with['artikel_new']      = $artikel_new;
        $with['artikel_right']    = $artikel_right;
        return view($this->folder.'.artikel',$with);
    }


    public function detail(Request $request , $id)
    {
        $artikel   = Artikel::where('active',1)->find($id);
        if($artikel){
            $next_artikel = Artikel::where('active',1)->where('id', '>', $id)->orderBy('id','asc')->first();
            $prev_artikel = Artikel::where('active',1)->where('id', '<', $id)->orderBy('id','desc')->first();

            $with = $this->artikelComponen();
            $with['data'] = $artikel;
            $with['next_artikel'] = $next_artikel;
            $with['prev_artikel'] = $prev_artikel;
            return view($this->folder.'.detail.artikel_detail',$with);
        }
        return redirect()->back();
    }

    public function artikelComponen()
    {
        $artikel_next  = Artikel::where('active',1)->orderBy('id','DESC')->limit(5,10)->get();
        $artikel_category = Artikel_category::where('active',1)->orderBy('id','DESC')->get();

        $with['artikel_next']     = $artikel_next;
        $with['artikel_category'] = $artikel_category;

        return $with;
    }


}
