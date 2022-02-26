<?php

namespace App\Libs;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class Helptbl_master {

    protected $idMenuAktif = array();

    public function gettable($tablename, $recordsUrl, $coldef){

        $table = "<script>"
            ." $(\"#$tablename\").DataTable({"
            . " paging: true,
                lengthMenu: [10, 25, 50,100],
                pageLength: 10,
                searchDelay: 300,
                processing: !0,
                serverSide: !0,
                order: [
                    [1, \"desc\"]
                ],
                ajax: {
                    url: \"$recordsUrl\",
                    type: \"POST\",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')
                    },
                    //beforeSend: function () {
                    //    $(\"#$tablename\").append(\"<div class='loader'><div class='loading'></div></div>\");
                    //},
                    data: function(data) {

                        $.each(data, function(key, value) {
                                    data[key] = value;
                        });
                    }
                }"
            ."})"
        ."</script>";
        return  $table;
        //$('#master_tabel').DataTable();
    }

    public static function instance() {
        return new Helptbl_master();
    }

}
