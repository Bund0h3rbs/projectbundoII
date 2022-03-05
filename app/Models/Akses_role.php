<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Akses_role extends Model
{
	 protected $table = 'akses_role';
     protected $guarded = ['id'];

     function check($id){
        $user =  Auth::user()->personal_id;
        $query = Akses_role::where('user_id', $user)
                ->where('link',$id)->first();
		return $query;
     }



}
