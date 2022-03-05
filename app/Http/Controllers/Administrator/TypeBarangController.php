<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Aksesrole;
use App\Models\Produk_ref;
class TypeBarangController extends Controller
{
    protected $folder = 'admin.masterProduk.type_brg';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();
        if ($cekAkses == true) {
            $with['title_header'] = "Referensi Barang";
            $with['table'] = "table_default";

            return view($this->folder.'.index',$with);
        }else{
            return redirect('/home');
        }
    }


    function getlist(Request $request){
        $tables = new Produk_ref();
        //$count = Adm_menus::count();

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
        $listdata = $filter->skip($iDisplayStart)->take($iDisplayLength)->get();

        $data = [];
        $parentName = "-";
        foreach ($listdata as $x) {
            $row = array();

            if($x->active == 1){
              $status = '<span class="badge badge-primary p-2"> Active </span>';
            }else{
             $status = "<span class='badge badge-danger p-2'> Non Active </span>";
            }

            $tombol ="<div class='text-center'>"
             ."<a class='badge badge-danger p-2'  onclick='deletemenu(".$x->id.");' title='Hapus Data'><i class='fa fa-trash-alt'></i></a>&nbsp;"
             ."<a class='badge badge-success p-2' onclick='editMenu(".$x->id.");' title='Edit Data' ><i class='fas fa-pencil-alt'></i></a>&nbsp;"
             ."</div>";

           $row[] = $tombol;
           $row[] = $status;
           $row[] = "<div style='width:150px'>".$x->name."</div>";
           $row[] = (isset($x->detail)? $x->detail :'-');


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
            $datas = Produk_ref::find($request->id);
        }
        $with['data']  = $datas;
        return view($this->folder.'.formcreate', $with);
    }

    function store(Request $request){
        $input = $request->all();

        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token","id")))
			{
                $row[$k]=$v;
			}
		}
        if($request->active == null){
            $row['active'] = 0;
        }

        $saveMenus = Produk_ref::find($request->id);
        if($saveMenus){
            $saveMenus->update($row);
        }else{
            Produk_ref::create($row);
        }

        $success = true;
        echo json_encode(array("success"=>$success));
    }


    function delete(Request $request){

        $delete = Produk_ref::find($request->id);
        if($delete){
            $delete->delete();
        }

        $success = true;
        echo json_encode(array("success"=>$success));
    }

}
