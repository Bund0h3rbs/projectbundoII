<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pesan_contact;

class ContactController extends Controller
{
    protected $folder = 'website';

    public function index(Request $request)
    {

        return view($this->folder.'.contact');
    }

    public function pesan(Request $request)
    {
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
            $row['date'] = $date_now;
            Pesan_contact::create($row);
            $success = true;
        }

        return json_encode(array("success"=>$success));
    }



}
