@extends('template.template-admin')
<style>
     .table-head{
         width: 100%;
         font-family: inherit;
     }
    .table-head th{
        text-align: center;
    }
    .table-head th{
        padding:10px;
        font-size:0.9em;
    }

    .table-head td{
        padding:0.4em;
    }

</style>
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="far fa-list-alt"></i>
        Daftar Barang
        </h3>
    </div>
    <div class="card-body">
        <table class="table-bordered table-head">
            <thead class="bg-primary">
                <tr >
                    <th >No</th>
                    <th>Action</th>
                    <th>Kode</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">
                        <a class="badge badge-warning p-2" title="Rubah Data">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="badge badge-danger p-2" title="Hapus Data">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td class="text-center">001</td>
                    <td>Pertamax</td>
                    <td>BBM</td>
                    <td class="text-center"><span class="badge badge-primary"> Aktif</span></td>
                    <td>
                        Create Date : 20-12-2021
                    </td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">
                        <a class="badge badge-warning p-2" title="Rubah Data">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="badge badge-danger p-2" title="Hapus Data">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td class="text-center">002</td>
                    <td>Enduro 4T</td>
                    <td>Pelumas</td>
                    <td class="text-center"><span class="badge badge-primary"> Aktif</span></td>
                    <td>
                        Create Date : 20-12-2021
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
