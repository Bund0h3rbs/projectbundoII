<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Supplier extends Model
{
    use SoftDeletes;

    protected $table = 'supplier';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );


    // Serverside
    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            $data = Supplier::Where('name', 'LIKE', '%' . $value . '%')
                ->count();
          }else {
                 $data = Supplier::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
            $data = Supplier::Where('name', 'LIKE', '%' . $value . '%');
         }else {
            $data = Supplier::select(['*']);
        }
        return $data;
    }

}
