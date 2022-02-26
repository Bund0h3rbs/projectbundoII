<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Adm_roleakses extends Model
{
    use SoftDeletes;

    protected $table = 'adm_roleakses';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    // Join link table
    public function users(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function akses(){
        return $this->belongsTo('App\Models\Menus_akses', 'akses_id', 'id');
    }
    // Serverside


}
