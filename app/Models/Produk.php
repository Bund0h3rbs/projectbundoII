<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Produk extends Model
{
    use SoftDeletes;

    protected $table = 'produk';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    public function produk_ref() {
        return $this->belongsTo('App\Models\Produk_ref','produk_ref_id','id');
    }

    public function personal() {
        return $this->belongsTo('App\Models\Personal', 'creator','id');
    }

    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Produk::where('active',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Produk::where('active',2)
                ->count();
            }else{
                $data = Produk::Where('name', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Produk::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Produk::where('active',1);
            }else if($value == "Tidak"){
                $data =  Produk::where('active',2);
            }else{
                $data = Produk::Where('name', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Produk::select(['*']);
        }
        return $data;
    }

}
