<?php

namespace App\Libs;

use Auth;
use App\Models\Akses_menu;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class Appmenus {

    protected $idMenuAktif = array();

	public function getMenu() {
        $menus  = new Akses_menu();
        $teksmenu = "";
        $check_users = $menus->checkUser();

        if ($check_users) {
            $listmenu = $menus->listkMenu($check_users->akses_id);

            $teksmenu = $this->getMenuList($listmenu, $check_users->akses_id);

        }

        $url = url('/');
        $teksmenu = str_replace('{{ route(', $url . '/', $teksmenu);
        $teksmenu = str_replace(') }}', '', $teksmenu);

       return $teksmenu;
    }

    function getMenuList($listmenu, $akses_id){


        $menus  = new Akses_menu();
        $submenu = [];
        $view = "";
        $active =[];

        $act_menu = $this->menuActive();

        $path = request::path();
        $exp = explode('/', $path);


		if($listmenu->count() > 0 ){

			foreach($listmenu as $data)
			{
                $open 	= "";
                $active = "";
                if(empty($data->link)){
                    $submenu = $menus->submenu($data->id, $akses_id);
                    if(count($submenu) > 0){

                        if ($data->id == $act_menu['induk']) {
                            $open = "menu-open";
                            $active = "active";
                        }
                        $view .= '<li class="nav-item has-treeview '.$open.'">'
                        .'<a href="javascript:;" class="nav-link '.$active.'">
                            <i class="nav-icon '.$data->icon.'"></i>
                            <p>'. $data->name.'
                                <i class="right fas fa-angle-left"></i>
                            </p>
                         </a>
                         <ul class="nav nav-treeview">';

                         foreach($submenu as $sub){
                            $subopen = "";
                            $subactive = "";
                            $icon = "far fa-circle";
                            $link = $this->linkAkses($sub->link, $sub->modul);

                             if($sub->icon){
                                 $icon = $sub->icon;
                             }

                             if ($sub->id == $act_menu['submenu']) {
                                $subopen = "menu-open";
                                $subactive = "active";
                             }

                             $submenu_2 = $menus->submenu($sub->id, $akses_id);
                             if (count($submenu_2) > 0) {
                                $view .= '<li class="nav-item has-treeview '.$subopen.'">'
                                .'<div class="ml-2"><a href="javascript:;" class="nav-link '.$subactive.'">
                                    <i class="nav-icon '.$icon.'"></i>
                                    <p>'. $sub->name.'
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                 </a></div>
                                 <ul class="nav nav-treeview">';

                                foreach ($submenu_2 as $x) {
                                    $itemsactive ="";
                                    $icon_2 = "far fa-circle";
                                    $link = $this->linkAkses($x->link, $x->modul);
                                    if ($x->icon) {
                                        $icon_2 = $x->icon;
                                    }

                                    if ($x->id == $act_menu['menuItems']) {

                                        $itemsactive = "active";
                                     }

                                $submenu_3 = $menus->submenu($x->id, $akses_id);
                                if (count($submenu_3) > 0) {

                                  }else{
                                    $view .= '<li class="nav-item">
                                    <div class="ml-2"><a href="'. $link.'" class="nav-link '.$itemsactive.'">
                                    <i class="nav-icon '.$icon_2.'"></i>
                                    <p>'. $x->name.'</p>
                                    </a></div>
                                    </li>';
                                  }
                                }
                                $view .='</ul></li>';
                             }else{
                                if ($sub->id == $act_menu['menuItems']) {
                                    $subactive = "active";
                                }
                             $view .= '<li class="nav-item">
                             <div class="ml-2"><a href="'. $link.'" class="nav-link '.$subactive.'">
                                <i class="nav-icon '.$icon.'"></i>
                                <p>'. $sub->name.'</p>
                                </a></div>
                             </li>';
                             }
                         }

                        $view .='</ul></li>';
                    }else{
                        $link = $this->linkAkses($data->link, $data->modul);
                        if ($data->id == $act_menu['menuItems']) {
                            $active = "active";
                        }
                        $view .= '<li class="nav-item has-treeview">'
                        .'<a href="'.$link.'" class="nav-link '.$active.'">
                            <i class="nav-icon '.$data->icon.'"></i>
                            <p>
                            '. $data->name.'
                            </p>
                            </a>';

                    $view .='</li>';
                    }

                }else{
                    $link = $this->linkAkses($data->link, $data->modul);
                    if ($data->id == $act_menu['menuItems']) {
                        $active = "active";
                    }
                    $view .= '<li class="nav-item">'
                    .'<a href="' .$link.'" class="nav-link '.$active.'">'
                    .'<i class="'.$data->icon.' nav-icon"></i>'
                    .'<p>'. $data->name.'</p>'
                    .'</a>'
                  .'</li>';
                }

			}
		}else{
			$view = "";
		}

		return $view;
    }

    function linkAkses($link=null, $modul = null )
    {
        $data = '';
        if (!empty($link)) {
                $data = '{{ route(';
                if (!empty($link))
                  $data .= $link . ') }}';

        }
        return $data;

    }

    function menuActive(){
        $menus  = new Akses_menu();

        $path = request::path();
        $exp = explode('/', $path);

        // Default Data
        $items   = 0;
        $submenu = 0;
        $induks  = 100;
        if ($exp[0]) {
        $data = $menus->where('link',$exp[0])->first();
            if ($data) {
                $items = $data->id;
                $subData = $menus->find($data->parent);
                if ($subData) {
                    $submenu = $subData->id;
                    $datainduks = $menus->find($subData->parent);
                    if ($datainduks) {
                        $induks = $datainduks->id;
                    } else {
                        $induks = $subData->id;
                    }
                }
            }
        }


        $link['menuItems'] = $items;
        $link['submenu']   = $submenu;
        $link['induk']     = $induks;

        //dd($link,$exp[1]);
        return $link;
    }

    function menuSubmenu($submenu){
        $data ="";

        return $data;
    }

    public function getMenuNew(){
        $menus  = new Akses_menu();
        $teksmenu = "";
        $check_users = $menus->checkUser();

        if ($check_users) {
            $listmenu = $menus->listkMenu($check_users->akses_id);

            $teksmenu = $this->MenuList($listmenu, $check_users->akses_id);

        }

        $url = url('/');
        $teksmenu = str_replace('{{ route(', $url . '/', $teksmenu);
        $teksmenu = str_replace(') }}', '', $teksmenu);

       return $teksmenu;
    }

    function MenuList($listmenu, $akses_id){


        $menus  = new Akses_menu();
        $submenu = [];
        $view = "";
        $active =[];

        $act_menu = $this->menuActive();

        $path = request::path();
        $exp = explode('/', $path);


		if($listmenu->count() > 0 ){

			foreach($listmenu as $data)
			{
                $open 	= "";
                $active = "";
                if(empty($data->link)){
                    $submenu = $menus->submenu($data->id, $akses_id);
                    if(count($submenu) > 0){

                        if ($data->id == $act_menu['induk']) {
                            $open = "menu-item-open";
                            $active = "menu-item-active";
                        }
                        $view .= '<li class="menu-item menu-item-submenu'.$open.'" aria-haspopup="true"  data-menu-toggle="hover">'
                        .'<a href="javascript:;" class="menu-link menu-toggle">
                            <i class="svg-icon menu-icon '.$data->icon.'"></i>
                            <span class="menu-text">'. $data->name.'</span>
                                <i class="menu-arrow"></i>
                         </a>
                         <div class="menu-submenu "> <i class="menu-arrow"></i>
                         <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true" >
                            <span class="menu-link">
                                <span class="menu-text">'. $data->name.'</span>
                            </span>
                            </li>';
                         foreach($submenu as $sub){
                            $subopen = "";
                            $subactive = "";
                            $icon = "fa fa-circle";
                            $link = $this->linkAkses($sub->link, $sub->modul);

                             if($sub->icon){
                                 $icon = $sub->icon;
                             }

                             if ($sub->id == $act_menu['submenu']) {
                                $subopen = "menu-item-open";
                                $subactive = "menu-item-active";
                             }

                             $submenu_2 = $menus->submenu($sub->id, $akses_id);
                             if (count($submenu_2) > 0) {
                                $view .= '<li class="menu-item menu-item-submenu '.$subopen.'" aria-haspopup="true">'
                                .'<a href="javascript:;" class="menu-link menu-toggle">
                                <i class="svg-icon menu-icon '.$icon.'"></i>
                                <span class="menu-text">'. $sub->name.'</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                 <div class="menu-submenu "> <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">';


                                foreach ($submenu_2 as $x) {
                                    $itemsactive ="";
                                    $icon_2 = "fas fa-circle";
                                    $link = $this->linkAkses($x->link, $x->modul);
                                    if ($x->icon) {
                                        $icon_2 = $x->icon;
                                    }

                                    if ($x->id == $act_menu['menuItems']) {

                                        $itemsactive = "menu-item-active";
                                     }

                                $submenu_3 = $menus->submenu($x->id, $akses_id);
                                if (count($submenu_3) > 0) {

                                  }else{
                                    $view .= '<li class="menu-item '.$itemsactive.'" aria-haspopup="true">
                                    <a href="'. $link.'" class="menu-link">
                                        <i class="menu-icon fa fa-circle p-2"></i>
                                        <span class="menu-text">'. $x->name.'</span>
                                    </a>
                                    </li>';
                                  }
                                }
                                $view .='</ul></div></li>';
                             }else{
                                if ($sub->id == $act_menu['menuItems']) {
                                    $subactive = "menu-item-active";
                                }
                             $view .= '<li class="menu-item '.$subactive.'" aria-haspopup="true">
                                            <a href="'. $link.'" class="menu-link">
                                                <i class="svg-icon menu-icon '.$icon.'"><span></span></i>
                                                <span class="menu-text">'. $sub->name.'</span>
                                            </a>
                                        </li>';
                             }
                         }

                        $view .='</ul></div></li>';
                    }else{
                        $link = $this->linkAkses($data->link, $data->modul);
                        if ($data->id == $act_menu['menuItems']) {
                            $active = "menu-item-active";
                        }
                        $view .= '<li class="menu-item '.$active.'">'
                        .'<a href="'.$link.'" class="menu-link ">
                            <i class="svg-icon menu-icon '.$data->icon.'"></i>
                            <span class="menu-text">
                            '. $data->name.'
                            </span></a>';

                    $view .='</li>';
                    }

                }else{
                    $link = $this->linkAkses($data->link, $data->modul);
                    if ($data->id == $act_menu['menuItems']) {
                        $active = "menu-item-active";
                    }
                    $view .= '<li class="menu-item '.$active.'">'
                    .'<a href="' .$link.'" class="menu-link">'
                    .'<i class="svg-icon menu-icon '.$data->icon.'"></i>'
                    .'<span class="menu-text">'. $data->name.'</span></a>'
                  .'</li>';
                }

			}
		}else{
			$view = "";
		}

		return $view;
    }


	public static function instance() {
        return new AppMenus();
    }
}
