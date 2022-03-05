<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Libs\Aksesrole;
use App\Libs\GlobalsHelpers;
use Auth;
use App\Models\Personal;
use App\Models\Menus_akses;
use App\Models\Users;
use App\Models\Adm_roleakses;

class UsersAdmController extends Controller
{
    protected $folder = 'admin.users';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $akses = new Aksesrole();
        $cekAkses = $akses->getAkses();
        if ($cekAkses == true) {
            $with['table'] = "table_default";
            $with['title_header'] = "User / Pengguna";

            return view($this->folder.'.index',$with);
        }else{
            return redirect('/home');
        }
    }

    function getlist(Request $request){
        $tables = new Personal();
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
           $row[] = "<div style='width:150px'>".$x->name."</div>";
           $row[] = $x->email ?? null;
           $row[] = isset($x->gender) ? $globaltools->jenkel($x->gender): '-';
           $row[] = $x->akses->akses->name ?? '-';


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
        $globaltools = new GlobalsHelpers();
        $datas = [];
        if($request->id){
            $datas = Personal::find($request->id);
        }

        $with['akses']    = Menus_akses::where('type','!=',1)->where('status','Y')->pluck('name','id')->toArray();
        $with['agama']    = $globaltools->religiontype();
        $with['jenkel']   = $globaltools->jenkeltype();
        $with['data']     = $datas;
        return view($this->folder.'.formcreate', $with);
    }

    function store(Request $request)
    {
        $globaltools = new GlobalsHelpers();
        $input = $request->all();

        // dd($request->all());
        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token","id","filename","akses_id","password")))
			{
                $row[$k]=$v;
			}
		}

        $row['created_by'] = Auth::user()->personal_id;

        if($request->id == null){
            $checkEmail = Personal::where('email',$request->email)->first();
            if($checkEmail){
                $with['success'] = false;
                $with['pesan']   = "Email Telah Terdaftar";
                return json_encode($with);
            }
        }

        if(isset($request->fileimage)){
            $row['fileimage'] = $globaltools->uploadFile($request, 'Personal');
        }

        $personal = Personal::find($request->id);
        if($personal){
           $save_personal = $personal->update($row);
           $personal_id = $personal->id;
        }else{
           $users = $this->storeUsers($request);
           $row['user_id'] = $users->id;
           $save_personal = Personal::create($row);
           $personal_id = $save_personal->id;

        }
        $sPersonal = Personal::find($personal_id);

        $user_update = Users::find($sPersonal->user_id ?? null);
//  dd($user_update);
        if($user_update){
            if($request->password){
                $password = $request->password;
                $users['password'] = Hash::make($password);
            }

            $users['personal_id'] = $personal_id;
            $user_update->update($users);
        }

        $this->storeAkses($request->akses_id, $personal_id);

        // dd($input);
        $success = true;
        return json_encode(array("success"=>$success));

    }

    function storeUsers($request)
    {
        // Check email dahulu
        $password = "U53rBunb0";
        if($request->password){
            $password = $request->password;
        }

        $users = Users::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        return $users;
    }

    function storeAkses($akses, $personal_id)
    {
        // Check email dahulu
        $checkAkses = Adm_roleakses::where('user_id',$personal_id)->first();

        $row['user_id']  = $personal_id;
        $row['akses_id'] = $akses;
        $row['active']   = 'Y';
        if($checkAkses){
            $checkAkses->update($row);
        }

        Adm_roleakses::create($row);

        return true;
    }

    function delete(Request $request)
    {
        $delete = Personal::find($request->id);
        if($delete){
            Adm_roleakses::where('user_id',$request->id)->delete();
            Users::where('personal_id',$request->id)->delete();

            $delete->delete();
        }

        $success = true;
        return json_encode(array("success"=>$success));
    }

}
