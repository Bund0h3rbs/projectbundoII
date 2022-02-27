<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Akses_menu extends Model
{
	 protected $table = 'akses_menus';
     protected $guarded = ['id'];
     
     public function listkMenu($id){

        $query = $this->where('parent',null)
                ->where('akses_id',$id)
                ->orderBy('no_urut','ASC')->get();

		return $query;
     }

	 function checkUser(){
        $user =  Auth::user()->personal_id;
        $query = \App\Models\Adm_roleakses::where('user_id', $user)->first();
		return $query;
     }

     function checkMenu($name, $id){
        $query = $this->where('status','Y')
            ->where('idakses',$id)
            ->where('link',$name)
            ->first();

        return $query;
    }

	function viewmenu($akses)
	{
		$query = $this->where('parent',null)
                ->where('akses_id',$akses)
                ->orderBy('no_urut','ASC')->get();

		return $query;
    }

    function submenu($id, $akses)
	{
		$query = $this->where('parent',$id)
			->where('akses_id',$akses)
            ->orderBy('no_urut','ASC')->get();

		return $query;
    }


}
