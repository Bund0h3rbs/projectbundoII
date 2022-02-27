<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Tabel & view
use App\Libs\Aksesrole;
use App\Models\Menus_app;
use App\Models\Menus_akses;
use App\Models\Menus_rolemenus;
class MenusController extends Controller
{
    protected $folder = 'admin.menu_all';
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    function create(Request $request)
    {
        $datas = [];
        if($request->id){
            $datas = Menus_app::find($request->id);
        }
        $with['data']  = $datas;
        $with['menus'] = Menus_app::nestedSelect();
        return view($this->folder.'.create', $with);
    }

    function addAkses(Request $request){
        $id = $request->id;
        $with['menus'] = Menus_app::nestedSelect();
        $with['menu'] = Menus_app::find($id);
        $with['akses'] = Menus_akses::all();

        return view($this->folder.'.aksesrole', $with);
    }

    function store(Request $request){
        $input = $request->input();

        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token","id")))
			{
				//if(!empty($input[$k])){
                    $row[$k]=$v;
                //}
			}
		}
        if($request->status == null){
            $row['status'] = 'N';
        }
        // dd($row);
        $saveMenus = Menus_app::find($request->id);
        if($saveMenus){
            // dd('kosng');
            $saveMenus->update($row);
        }else{
            // dd('ada');
            Menus_app::create($row);
        }

        $success = true;

        echo json_encode(array("success"=>$success));

    }


    function delete(Request $request){

        $delete = Menus_app::find($request->id);
        if($delete){
            $delete->delete();
        }

        $success = true;
        echo json_encode(array("success"=>$success));
    }

    function saveAkses(Request $request){
        $input = $request->all();
        $id = $request->id;

        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token",'id')))
			{
				if(!empty($input[$k])){
                    $row[$k]=$v;
                }
			}
        }


        if(isset($request->views)){
            $Cc    = count($request->views);


            $check_all = Menus_rolemenus::where('menus_id',$id )
            ->whereNotIn('akses_id',$request->views)->delete();

            for ($i = 0; $i < $Cc; $i++) {
                //$akses['akses_id = $request->akses_id[$i];
                $akses['menus_id'] = $id;

                if(isset($request->views[$i])){
                    $akses['akses_id'] = $request->views[$i];
                    $akses['views'] = 1;
                }

                if(isset($request->creator[$i])){
                    $akses['creator'] = 1;
                }else{
                    $akses['creator'] = "N";
                }
                if(isset($request->updater[$i])){
                    $akses['updater'] = 1;
                }else{
                    $akses['updater'] = "N";
                }

                if(isset($request->deleted[$i])){
                    $akses['deleted'] = 1;
                }else{
                    $akses['deleted'] = "N";
                }

                //dd($check_all);
                $check_akses = Menus_rolemenus::where(['menus_id'=> $id ,'akses_id'=>$request->views[$i]])->first();

                if(!empty($check_akses)){
                    $saveakses =  Menus_rolemenus::find($check_akses->id);
                    $saveakses->update($akses);
                }else{
                    $saveakses = Menus_rolemenus::create($akses);
                }

            }
        }
        $success = true;
        echo json_encode(array("success"=>$success));
    }

}
