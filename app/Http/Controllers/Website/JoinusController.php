<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Supplier;

class JoinusController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {

        return view($this->folder.'.joinus');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $date_now = date('Y-m-d');
        foreach ($input as $k => $v) //get value from $_POST
		{
			if(!in_array($k, array("_token","id","filename")))
			{
                $row[$k]=$v;
			}
		}

        if($request->name == null || $request->email == null){
            $success = false;
        }else{
            $row['date_join'] = $date_now;
            Supplier::create($row);
            $success = true;
        }

        return json_encode(array("success"=>$success));
    }



}
