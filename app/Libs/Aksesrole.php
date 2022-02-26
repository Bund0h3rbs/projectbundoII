<?php

namespace App\Libs;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Auth;

use App\Models\Akses_role;

class Aksesrole {

    public function getAkses() {
        $akses  = new Akses_role();
        $path = request::path();
        $exp = explode('/', $path);

        $cek = $akses->check($exp[0]);
        if($cek){
            $data = true;
        }else{
            $data = false;
        }

        return $data;
    }

    public function aksesLink(){
        $admrole  = new \App\Models\Adm_roleakses();
        $user_id  = Auth::user()->personal_id;

        $akses_devel   = false;
        $check_admrole = $admrole->where('user_id',$user_id)->first();
        if($check_admrole){
            if($check_admrole->akses->type == 1){
                $akses_devel = true;
            }
            
        }

        return $akses_devel;


    }
    public static function instance() {
        return new Aksesrole();
    }

}
