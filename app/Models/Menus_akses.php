<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Menus_akses extends Model
{
    use SoftDeletes;

    protected $table = 'menus_akses';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Adm_akses::where('status',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Adm_akses::where('status',2)
                ->count();
            }else{
                $data = Adm_akses::Where('title', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Adm_akses::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Adm_akses::where('status',1);
            }else if($value == "Tidak"){
                $data =  Adm_akses::where('status',2);
            }else{
                $data = Adm_akses::Where('title', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Adm_akses::select(['*']);
        }
        return $data;
    }

}
