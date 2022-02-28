<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Artikel extends Model
{
    use SoftDeletes;

    protected $table = 'artikel';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    public function kategori() {
        return $this->belongsTo('App\Models\Artikel_category','category_id','id');
    }

    public function personal() {
        return $this->belongsTo('App\Models\Personal', 'creator','id');
    }

    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Artikel::where('active',1)
                 ->count();
            }else if($value == "Tidak"){
                $data =  Artikel::where('active',2)
                ->count();
            }else{
                $data = Artikel::Where('name', 'LIKE', '%' . $value . '%')
                    ->count();
            }
          }else {
                 $data = Artikel::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            if($value == 'YA' ){
                $data =  Artikel::where('active',1);
            }else if($value == "Tidak"){
                $data =  Artikel::where('active',2);
            }else{
                $data = Artikel::Where('name', 'LIKE', '%' . $value . '%');
            }
         }else {
                $data = Artikel::select(['*']);
        }
        return $data;
    }

}
