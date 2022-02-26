<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{
    protected $folder = 'admin.administratif';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $with['title_header'] = "Daerah Administratif";
        return view($this->folder.'.index',$with);
    }

    public function lokasiType(Request $request)
    {
        $type = $request->type;

        switch($type){
            case 1:
                $with['title_header'] = "Provinsi";
                return view($this->folder.'.listprovinsi',$with);
                break;
            case 2:
                $with['title_header'] = "Kabupaten";
                return view($this->folder.'.listkabupaten',$with);
                break;
            case 3:
                $with['title_header'] = "Kecamatan";
                return view($this->folder.'.listkecamatan',$with);
                break;
            case 4:
                $with['title_header'] = "Kelurahan";
                return view($this->folder.'.listkelurahan',$with);
                break;
            default:
            
        }
    }

}
