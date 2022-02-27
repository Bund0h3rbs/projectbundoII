<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Artikel_category extends Model
{
    use SoftDeletes;

    protected $table = 'artikel_category';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Artikel_category::where('active',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Artikel_category::where('active',2)
                ->count();
            }else{
                $data = Artikel_category::Where('name', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Artikel_category::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Artikel_category::where('active',1);
            }else if($value == "Tidak"){
                $data =  Artikel_category::where('active',2);
            }else{
                $data = Artikel_category::Where('name', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Artikel_category::select(['*']);
        }
        return $data;
    }

}
