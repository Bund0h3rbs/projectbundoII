<?php

namespace App\Libs;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Auth;

class GlobalsHelpers {

    function tglIndo($tgl){

		$day = date('d',strtotime($tgl));
		$month = date('m',strtotime($tgl));
		$year = date('Y',strtotime($tgl));

		$bulan = $this->bulanIndo($month);

		$formattgl = $day.'-'.$bulan.'-'.$year;

		return $formattgl;
	}

	function tanggal($tgl){
		$format = date('d-m-Y',strtotime($tgl));
		return $format;
	}

    function tanggalWaktu($tgl){
        $waktu = date('H:i:s',strtotime($tgl));
		$tanggal = $this->tglIndo($tgl);

        $dateTime = $tanggal .' '. $waktu .' WIB';

		return $dateTime;
	}

	function blnIndo($tgl){

		$day = date('d',strtotime($tgl));
		$month = date('m',strtotime($tgl));
		$year = date('Y',strtotime($tgl));

		$bulan = $this->bulanIndo($month);

		$formattgl = $bulan.' - '.$year;

		return $formattgl;
	}

    function hariIndo($d){

        $hari = [
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selas',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu',
		];

        $dayIndo = $hari[$d];

		return $dayIndo;
	}

	function bulanIndo($m){

		$bulan = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
		    '06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];

		$bulanIndo = $bulan[$m];

		return $bulanIndo;
	}

	function formatnominal($id){
		$nominal = 0;
		if($id != null){
			$nominal = number_format($id);
		}
		return $nominal;
	}

	function rupiah($id){
		$nominal = 0;
		if($id != null){
			$nominal = "Rp. ".number_format($id);
		}
		return $nominal;
	}

	function waktuIndo($tgl){
		$waktu = date('H:i',strtotime($tgl));
		$day = date('d',strtotime($tgl));
		$month = date('m',strtotime($tgl));
		$year = date('Y',strtotime($tgl));

		$bulan = $this->bulanIndo($month);

		$formattgl = $day.'-'.$bulan.'-'.$year ." ". $waktu;

		return $formattgl;
	}

    function dayDateToIndo($date){
		$waktu = date('H:i',strtotime($date));
		$day = date('D',strtotime($date));
        $tgl = date('d',strtotime($date));
		$month = date('m',strtotime($date));
		$year = date('Y',strtotime($date));

		$bulan = $this->bulanIndo($month);
        $hari = $this->hariIndo($day);

		$formattgl = $hari .', '.$tgl.'-'.$bulan.'-'.$year;
		return $formattgl;
	}

    public function ekportXLSbiasa($param, $tabel, $data){

        $param = "v-kolom_e";
        $table = "v-Pam_ekport";
        $data = "v-Pam_ekport";

        foreach($param as $key_param => $val_param){

            foreach($data as  $key =>$val){
                $list[$data[$key_param]] = $val;
            }
        }
        return $list;
    }

    public function ekportXLSALL($param, $tabel, $data){

    }

    public function uploadFile($request, $folder)
    {
        // $table_file = new  \Modules\Admin\Entities\Tabel_aplikasi\ms_file();

        if ($request->fileimage) {
            $image = $request->file('fileimage');

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/'.$folder);
            $image->move($destinationPath, $imagename);

            // $list['file_link'] = $imagename;
            // $list['source_table'] = $table;
            // $list['source_id'] = $id;
            // $save_file = $table_file->create($list);

            // if (file_exists($destinationPath . '/' . $imagename)) {
            //    unlink($destinationPath . '/' . $imagename);
            // }
        }

        return $imagename;

    }

}
