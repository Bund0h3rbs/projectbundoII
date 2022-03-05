<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Produk_ref extends Model
{
    use SoftDeletes;

    protected $table = 'produk_ref';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Produk_ref::where('active',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Produk_ref::where('active',2)
                ->count();
            }else{
                $data = Produk_ref::Where('name', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Produk_ref::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Produk_ref::where('active',1);
            }else if($value == "Tidak"){
                $data =  Produk_ref::where('active',2);
            }else{
                $data = Produk_ref::Where('name', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Produk_ref::select(['*']);
        }
        return $data;
    }

}
