<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Aksesrole;
use App\Libs\GlobalsHelpers;

use App\Models\Supplier;

class SupplierController extends Controller
{
    protected $folder = 'admin.supplier.daftar';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();
        if ($cekAkses == true) {
            $with['title_header'] = "Daftar Suplier";
            $with['table'] = "table_default";

            return view($this->folder.'.index',$with);
        }else{
            return redirect('/home');
        }
    }


    function getlist(Request $request){
        $globaltools = new GlobalsHelpers();
        $tables = new Supplier();

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

            switch($x->status){
                case 1:
                    $status = '<span class="badge badge-primary p-2"> Register </span>';
                break;
                case 2:
                    $status = '<span class="badge badge-success p-2"> Terdaftar </span>';
                break;
                    default;
                    $status = '<span class="badge badge-danger p-2"> Ditolak </span>';
            }


            $tombol ="<div class='text-center'>"
             ."<a class='badge badge-danger p-2'  onclick='deletemenu(".$x->id.");' title='Hapus Data'><i class='fa fa-trash-alt'></i></a>&nbsp;"
             ."<a class='badge badge-success p-2' onclick='editMenu(".$x->id.");' title='Lihat Pesan' ><i class='fas fa-eye'></i></a>&nbsp;"
             ."</div>";

           $row[] = $tombol;
           $row[] = $status;
           $row[] = isset($x->date_join) ? $globaltools->tglIndo($x->date_join) : '';
           $row[] = "<div style='width:150px'>".$x->name."</div>";
           $row[] = (isset($x->no_telp)? $x->no_telp :'-');
           $row[] = (isset($x->email)? $x->email :'-');

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
            $datas = Supplier::find($request->id);
        }
        $with['data']  = $datas;
        return view($this->folder.'.formdetail', $with);
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

        $saveMenus = Supplier::find($request->id);
        if($saveMenus){
            $saveMenus->update($row);
        }else{
            Supplier::create($row);
        }

        $success = true;
        echo json_encode(array("success"=>$success));
    }


    function delete(Request $request){

        $delete = Supplier::find($request->id);
        if($delete){
            $delete->delete();
        }

        $success = true;
        echo json_encode(array("success"=>$success));
    }

}
