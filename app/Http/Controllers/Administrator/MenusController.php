<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Aksesrole;

// Tabel & view
use App\Models\Menus_app;
use Modules\Admin\Entities\Tabel\Adm_rolemenus;
use Modules\Admin\Entities\Tabel\Adm_akses;
// use Modules\Admin\Entities\Views\Menus_app;



class MenusController extends Controller
{
    protected $folder = 'admin.menu_all';

    public function index()
    {
        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();
        // dd($cekAkses);
        if ($cekAkses == true) {
            $data['title_header'] = "Menu Sistem";
            $data['table'] = "table_default";

            return view($this->folder.'.index', $data);

        }else{
            return redirect('/home');
        }

    }

    function getlist(Request $request){
        $tables = new Menus_app();

        $count = $tables->totaldata($request);
        $records = array();
        $records['iTotalRecords'] = $count;
        $records['iTotalDisplayRecords'] = $count;
        $records['sEcho'] = $request->draw;
        $records['sColumns'] = "";
        $records["data"] = array();

        $iTotalRecords = $count;
        $iDisplayLength = $request->length;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = $request->start;
        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        $filter = $tables->filterlist($request);
        $listdata = $filter->skip($iDisplayStart)->take($iDisplayLength)->orderBy('id','desc')->get();

        $data = [];
        $parentName = "-";
        foreach ($listdata as $x) {
            $row = array();

            if($x->status == 'Y'){
              $status = '<span class="badge badge-primary p-2"> Publish </span>';
            }else{
             $status = "<span class='badge badge-danger p-2'> Draf </span>";
            }

            if($x->icon){
              $icon = "<i class='".$x->icon ."'></i>";
            }else{
              $icon = "-";
            }

            $tombol ="<div class='text-center'>"
             ."<a href='javascript:;' class='badge badge-danger p-2' onclick='deletemenu(".$x->id.");' title='Hapus Data'><i class='fa fa-trash-alt'></i></a>&nbsp;"
             ."<a href='javascript:;' class='badge badge-success p-2' onclick='editMenu(".$x->id.");' title='Edit Data' ><i class='fas fa-pencil-alt'></i></a>&nbsp;"
             ."<a href='javascript:;' class='badge badge-warning p-2' onclick='rolemenu(".$x->id.");' title='Role Menu' ><i class='fas fa-cogs'></i></a>"
             ."</div>";

           $row[] = $tombol;
           $row[] = "<div class='text-center text-danger'><strong>".$x->id."</strong></div>";
           $row[] = $icon;
           $row[] = "<div style='width:150px'>".$x->name ?? 'na'."</div>";
           $row[] = "<div style='width:150px'>".$x->parent ??  '-'."</div>";
           $row[] = (isset($x->modul)? $x->modul :'-')."".(isset($x->link) ? "/".$x->link :'');
           $row[] = $status;

            $records["data"][] = $row;
        }

        if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
            $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        echo json_encode($records);
        exit;
    }

    function create(Request $request){

        $with['menus'] = Adm_menus::nestedSelect();
        return view($this->folder.'.create', $with);
    }

    function edit(Request $request){
        $id = $request->input('id');
        $with['menus'] = Adm_menus::nestedSelect();
        $with['data'] = Adm_menus::find($id);

        return view('admin::Menus.edit', $with);
    }

    function addAkses(Request $request){
        $id = $request->input('id');
        $with['menus'] = Adm_menus::nestedSelect();
        $with['menu'] = Adm_menus::find($id);
        $with['akses'] = Adm_akses::all();

        return view('admin::Menus.aksesrole', $with);
    }

    function store(Request $request){
        $input = $request->input();
        $tbmenus = new Adm_menus();

        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token")))
			{
				//if(!empty($input[$k])){
                    $row[$k]=$v;
                //}
			}
		}
        $saveMenus = $tbmenus->create($row);
        $success = true;

        echo json_encode(array("success"=>$success));

    }

    function update(Request $request){
        $input = $request->input();
        $id = $input['id'];
        $tbmenus = new Adm_menus();

        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token",'id')))
			{
				//if(!empty($input[$k])){
                    $row[$k]=$v;
                //}
			}
        }

        $saveMenus = $tbmenus->find($id);
        $saveMenus->update($row);
        $success = true;

        echo json_encode(array("success"=>$success));
    }

    function delete(Request $request){
        $tbmenus = new Adm_menus();
        $input = $request->input('id');
        $delete = $tbmenus->find($input);
        $delete->delete();

        $success = true;
        echo json_encode(array("success"=>$success));
    }

    function saveAkses(Request $request){
        $input = $request->input();
        $id = $input['id'];
        $tbroleAkses = new Adm_rolemenus();

        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token",'id')))
			{
				if(!empty($input[$k])){
                    $row[$k]=$v;
                }
			}
        }


        if(isset($input['views'])){
            $Cc    = count($input['views']);


            $check_all = $tbroleAkses->where('menus_id',$id )
            ->whereNotIn('akses_id',$input['views'])->delete();

            for ($i = 0; $i < $Cc; $i++) {
                //$akses['akses_id'] = $input['akses_id'][$i];
                $akses['menus_id'] = $id;

                if(isset($input['views'][$i])){
                    $akses['akses_id'] = $input['views'][$i];
                    $akses['views'] = 1;
                }

                if(isset($input['creator'][$i])){
                    $akses['creator'] = 1;
                }else{
                    $akses['creator'] = "N";
                }
                if(isset($input['updater'][$i])){
                    $akses['updater'] = 1;
                }else{
                    $akses['updater'] = "N";
                }

                if(isset($input['deleted'][$i])){
                    $akses['deleted'] = 1;
                }else{
                    $akses['deleted'] = "N";
                }

                //dd($check_all);
                $check_akses = $tbroleAkses->where(['menus_id'=> $id ,'akses_id'=>$input['views'][$i]])->first();

                if(!empty($check_akses)){
                    $saveakses =  $tbroleAkses->find($check_akses->id);
                    $saveakses->update($akses);
                }else{
                    $saveakses = $tbroleAkses->create($akses);
                }

            }
        }
        $success = true;
        echo json_encode(array("success"=>$success));
    }

}
