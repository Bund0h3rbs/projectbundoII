<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Personal extends Model
{
    use SoftDeletes;

    protected $table = 'personal';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    // public function kategori() {
    //     return $this->belongsTo('App\Models\Artikel_category', 'id', 'category_id');
    // }

    public function akses() {
        return $this->hasOne('App\Models\Adm_roleakses', 'user_id','id');
    }

    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Personal::where('active',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Personal::where('active',2)
                ->count();
            }else{
                $data = Personal::Where('name', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Personal::where('id','!=','34')->count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Personal::where('active',1);
            }else if($value == "Tidak"){
                $data =  Personal::where('active',2);
            }else{
                $data = Personal::Where('name', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Personal::select(['*']);
        }
        return $data->where('id','!=','34');
    }

}
