<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Tabel & view
use App\Libs\Aksesrole;
use App\Libs\GlobalsHelpers;
use Auth;
use App\Models\Artikel_category;
use App\Models\Artikel;
class ArtikelController extends Controller
{
    protected $folder = 'admin.artikel.news';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();

        if ($cekAkses == true) {
            $data['title_header'] = "Artikel";
            $data['table'] = "table_default";

            return view($this->folder.'.index', $data);

        }else{
            return redirect('/home');
        }

    }
    function getlist(Request $request){
        $tables = new Artikel();
        $globaltools = new GlobalsHelpers();

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
           $row[] = $globaltools->tglIndo($x->publish_date);
           $row[] = "<div style='width:150px'>".$x->name."</div>";
           $row[] = $x->kategori->name ?? '-';
           $row[] = $x->personal->name ?? '-';


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
            $datas = Artikel::find($request->id);
        }
        $with['kategori'] = Artikel_category::pluck('name','id')->toArray();
        $with['data']  = $datas;
        return view($this->folder.'.formcreate', $with);
    }

    function store(Request $request)
    {
        $globaltools = new GlobalsHelpers();
        $input = $request->all();

        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token","id","filename")))
			{
                $row[$k]=$v;
			}
		}
        if(isset($request->fileimage)){
            $row['fileimage'] = $globaltools->uploadFile($request, 'artikel');
        }

        $row['publish_date'] = date('Y-m-d H:i:s');
        $row['creator'] = Auth::user()->personal_id;

        $saveMenus = Artikel::find($request->id);
        if($saveMenus){
            $saveMenus->update($row);
        }else{
            Artikel::create($row);
        }

        // dd($input);
        $success = true;
        return json_encode(array("success"=>$success));

    }

    function delete(Request $request)
    {
        $delete = Artikel::find($request->id);
        if($delete){
            $delete->delete();
        }

        $success = true;
        return json_encode(array("success"=>$success));
    }
}
