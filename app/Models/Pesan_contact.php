<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Pesan_contact extends Model
{
    use SoftDeletes;

    protected $table = 'pesan_contact';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );


    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Pesan_contact::where('active',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Pesan_contact::where('active',2)
                ->count();
            }else{
                $data = Pesan_contact::Where('name', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Pesan_contact::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Pesan_contact::where('active',1);
            }else if($value == "Tidak"){
                $data =  Pesan_contact::where('active',2);
            }else{
                $data = Pesan_contact::Where('name', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Pesan_contact::select(['*']);
        }
        return $data;
    }

}
