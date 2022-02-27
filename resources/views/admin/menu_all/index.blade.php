@extends('template.template-admin')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline" id="defaultform">
                    <div class="card-header">
                        <h3 class="card-title">Listmenu</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="addItems">
                             <strong>Add Menu</strong>
                            <i class="fa fa-plus col-lg-2"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-sm">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-sm"  id="{{$table}}">
                        <thead class="bg-primary">
                         <tr>
                          <td width="150px" >Action</td>
                          <td >Code</td>
                          <td >Icon</td>
                          <td >Nama</td>
                          <td >Parent</td>
                          <td >Link</td>
                          <td >Status</td>
                         </tr>
                         </thead>
                         <tbody class="text-sm"></tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="isiform">

            </div>
        </div>
    </div>
</section>
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$recordsUrl = route('menu.getlist');
$coldef = ['{targets: 0, width: "60px", className: "dt-right", orderable: true}', '{targets: 0, orderable: false}'];
@endphp
{!! \App\Libs\Helptbl_master::instance()->gettable($table, $recordsUrl, $coldef) !!}


<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('#addItems').click(function(){
        $.ajax({
           type: "POST",
           url:  "{{route('menu.create')}}",
           data: {"_token": "{{ csrf_token() }}"},
		   beforeSend: function () {
            $('#defaultform').append('<div class="loader "><div class="loading"></div></div>');
			},
           success: function(e)
           {
            $('.loader').remove();
            $( "#defaultform" ).hide();
			$('#isiform').html(e);
           }, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').remove();
                Swal.fire("Warning!", "Terjadi Kesalahan Untuk mengakses menu ini, Segera hubungi Admin kami", "warning");
            }
        })
        //$('#defaultform').hide();
        //$('#isiform').html("OKE BUNG");
    });

function editMenu(id)
{
	$.ajax({
    type: "POST",
    url: "{{route('menu.create')}}",
	data:{"_token": "{{ csrf_token() }}","id":id},
    beforeSend: function () {
        $('#defaultform').append('<div class="loader "><div class="loading"></div></div>');
    },
    success: function(e)
        {
            $('.loader').remove();
            $("#defaultform" ).hide();
			$('#isiform').html(e);
        }, error: function (xhr, ajaxOptions, thrownError) {
            $('.loader').remove();
            Swal.fire("Warning!", "Terjadi Kesalahan Untuk mengakses menu ini, Segera hubungi Admin kami", "warning");
        }
    })
};
function deletemenu(id)
{
    Swal.fire({
        title: "Are you sure?",
        text: "Menu Aplikasi Akan di hapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete!"
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "{{route('menu.delete')}}",
                data:{"id":id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e)
                {
                e = jQuery.parseJSON(e);
                    if(e.success == true)
                    {
                        Swal.fire(
                            "Deleted!",
                            "Terima Kasih !!!.",
                            "success"
                        )
                        $('#table_default').DataTable().ajax.reload();
                    }
                }, error: function (xhr, ajaxOptions, thrownError) {
                    $('.loader').remove();
                    Swal.fire("Warning!", "Terjadi Kesalahan Untuk mengakses menu ini, Segera hubungi Admin kami", "warning");
                }
            })
        }
    });
};

function rolemenu(id){
    $.ajax({
    type: "POST",
    url: "{{route('menu.addAkses')}}",
	data:{"_token": "{{ csrf_token() }}","id":id},
    beforeSend: function () {
        $('#defaultform').append('<div class="loader "><div class="loading"></div></div>');
    },
    success: function(e)
        {
            $('.loader').remove();
            $("#defaultform" ).hide();
			$('#isiform').html(e);
        }, error: function (xhr, ajaxOptions, thrownError) {
            $('.loader').remove();
            Swal.fire("Warning!", "Terjadi Kesalahan Untuk mengakses menu ini, Segera hubungi Admin kami", "warning");
        }
    })
}
</script>
@endsection
