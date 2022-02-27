@extends('template.template-admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline" id="defaultform">
            <div class="card-header">
                <h3 class="card-title">Listakses</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="addItems">
                     <strong>Add Items</strong>
                    <i class="fa fa-plus col-lg-2"></i>
                    </button>
                </div>
            </div>
            <div class="card-body text-sm">
            <div class="table-responsive">
                <table class="table table-bordered table-striped"  id="{{$table}}">
                <thead class="bg-primary">
                 <tr>
                  <th width="120px">Action</th>
                  <th width="100px">Status</th>
                  <th >Name Akses</th>
                  <th >Keterangan</th>
                 </tr>
                 </thead>
                </table>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" id="isiform"></div>
</div>

<div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header text-sm">
          <h4 class="modal-title">Tambah / Rubah Akses</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="isi-form-modal">
          <p>One fine body…</p>
          {{-- <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> --}}
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$recordsUrl = route('akses.getlist');
$coldef = ['{targets: 0, width: "60px", className: "dt-right", orderable: true}', '{targets: 0, orderable: false}'];
@endphp
{!! \App\Libs\Helptbl_master::instance()->gettable($table, $recordsUrl, $coldef) !!}

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('#addItems').click(function(){

        $.ajax({
           type: "POST",
           url:  "{{route('akses.create')}}",
           data: {"_token": "{{ csrf_token() }}"},
		   beforeSend: function () {
            $('#defaultform').append('<div class="loader "><div class="loading"></div></div>');
			},
           success: function(e)
           {
            $('.loader').remove();
            $('#modal-form').modal('show');
			$('#isi-form-modal').html(e);
            }, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').remove();
                Swal.fire("Warning!", "Terjadi Kesalahan Untuk mengakses menu ini, Segera hubungi Admin kami", "warning");
            }
        })
    });

    function editMenu(id)
    {
        $.ajax({
        type: "POST",
        url: "{{route('akses.create')}}",
        data:{"_token": "{{ csrf_token() }}","id":id},
        beforeSend: function () {
            $('#defaultform').append('<div class="loader "><div class="loading"></div></div>');
        },
        success: function(e)
           {
            $('.loader').remove();
            $('#modal-form').modal('show');
			$('#isi-form-modal').html(e);
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
            text: "Akses Aplikasi Akan di hapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                type: "POST",
                url: "{{route('akses.delete')}}",
                data:{"id":id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e)
                {
                e = jQuery.parseJSON(e);
                    if(e.success == true)
                    {
                        Swal.fire("Deleted!","Terima Kasih !!!.","success")
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

    function allRole(id){
        $.ajax({
        type: "POST",
        url: "{{route('akses.allakses')}}",
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
               if(xhr.status == 500){
                    Swal.fire("Warning!", "Terjadi kesalahan Link / Pemanggilan URL", "warning");
                }else {
                    Swal.fire("Info", "Terjadi Kesalahan Sistem", "info");
                }
            }
        })
    }

    function spesificRole(id){
        $.ajax({
        type: "POST",
        url: "{{route('akses.privateakses')}}",
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
               if(xhr.status == 500){
                    Swal.fire("Warning!", "Terjadi kesalahan Link / Pemanggilan URL", "warning");
                }else {
                    Swal.fire("Info", "Terjadi Kesalahan Sistem", "info");
                }
            }
        })
    }

</script>
@endsection
