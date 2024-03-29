<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if(Request::is(['home','home/*'])){
    require __DIR__.'/home.php';

}else if(Request::is(['menu_app','menu_app/*'])){
        require __DIR__.'/menu_app.php';
}else if(Request::is('menu_akses','menu_akses/*')){
    require __DIR__.'/menu_akses.php';
}else if(Request::is('artikel_cat','artikel_cat/*')){
    require __DIR__.'/artikel_cat.php';
}else if(Request::is('artikel_list','artikel_list/*')){
    require __DIR__.'/artikel_list.php';

}else if(Request::is(['usr_adm','usr_adm/*'])){
    require __DIR__.'/usr_adm.php';

}else if(Request::is(['produk_ref','produk_ref/*'])){
    require __DIR__.'/type_brg.php';

}else if(Request::is(['lokasi','lokasi/*'])){
    require __DIR__.'/lokasi.php';

}else if(Request::is(['daftar_brg','daftar_brg/*'])){
    require __DIR__.'/daftar_brg.php';

}else if(Request::is(['klien_list','klien_list/*'])){
    require __DIR__.'/klien.php';

}else if(Request::is(['suplier_join','suplier_join/*'])){
    require __DIR__.'/suplier_join.php';

}else if(Request::is(['suplier_contact','suplier_contact/*'])){
    require __DIR__.'/suplier_contact.php';

}else{
    
    // Route::get('/', function () {
    //     return view('welcome');
    // });
}

