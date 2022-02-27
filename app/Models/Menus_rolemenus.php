<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Menus_rolemenus extends Model
{
    use SoftDeletes;

    protected $table = 'menus_rolemenus';
    protected $guarded = ['id'];
    // public static $rules = array(
    //     'name' => 'required'
    // );

    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Menus_rolemenus::where('status',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Menus_rolemenus::where('status',2)
                ->count();
            }else{
                $data = Menus_rolemenus::Where('title', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Menus_rolemenus::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Menus_rolemenus::where('status',1);
            }else if($value == "Tidak"){
                $data =  Menus_rolemenus::where('status',2);
            }else{
                $data = Menus_rolemenus::Where('title', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Menus_rolemenus::select(['*']);
        }
        return $data;
    }

}
