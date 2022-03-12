<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Artikel;
use App\Models\Artikel_category;
use App\Models\Artikel_viewer;
use App\Models\Produk;
use App\Models\Produk_ref;
class ProdukController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {
        $produk_all   = Produk::where('active',1)->orderBy('id','DESC')->limit(12)->get();
        foreach($produk_all as $new){
            $produk_ids[$new->id] = $new->id;
        }
        $artikel_right = Artikel::whereNotIn('id',$produk_ids)->where('active',1)->orderBy('id','DESC')->limit(5)->get();

        $with['produk_all']      = $produk_all;
        $with['artikel_right']    = $artikel_right;
        return view($this->folder.'.produk',$with);
    }

    public function detail(Request $request , $id)
    {
        $produk   = Produk::where('active',1)->find($id);
        if($produk){
            $next_artikel = Artikel::where('active',1)->where('id', '>', $id)->orderBy('id','asc')->first();
            $prev_artikel = Artikel::where('active',1)->where('id', '<', $id)->orderBy('id','desc')->first();

            // $with = $this->artikelComponen();
            $with['data'] = $produk;
            $with['next_artikel'] = $next_artikel;
            $with['prev_artikel'] = $prev_artikel;
            return view($this->folder.'.detail.produk_detail',$with);
        }
        return redirect()->back();
    }



}
