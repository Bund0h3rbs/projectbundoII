@extends('template.template-admin')
@section('content')
<div class="row text-sm" id="defaultform">
    <div class="col-md-12 order-2 order-md-1">
        <div class="alert bg-warning-disabled ">
            <i class="fa fa-exclamation-triangle fa-2x"></i>
            Pastikan Penulisan artikel sesuai dengan ketentuan berlaku
        </div>
    </div>
    <div class="col-lg-12  order-1 order-md-2">
        <div class="card card-primary card-outline" >
            <div class="card-header">
                <h3 class="card-title">List Artikel</h3>
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
                <thead class="bg-info">
                 <tr>
                  <th width="120px">Action</th>
                  <th width="100px">Status</th>
                  <th width="150px">Tanggal Publish</th>
                  <th >Judul</th>
                  <th >Kategori</th>
                  <th >Creator</th>
                 </tr>
                 </thead>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="row text-sm">
    <div class="col-md-12" id="isiform"></div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$recordsUrl = route('artikel.getlist');
$coldef = ['{targets: 0, width: "60px", className: "dt-right", orderable: true}', '{targets: 0, orderable: false}'];
@endphp
{!! \App\Libs\Helptbl_master::instance()->gettable($table, $recordsUrl, $coldef) !!}
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

<script >
 $('#addItems').click(function(){

    $.ajax({
        type: "POST",
        url:  "{{route('artikel.create')}}",
        data: {"_token": "{{ csrf_token() }}"},
        beforeSend: function () {
        $('.loader').show();
        },
        success: function(e)
        {
        $('.loader').hide();
        $('#defaultform').hide();
        $('#isiform').html(e);
        }, error: function (xhr, ajaxOptions, thrownError) {
            $('.loader').hide();
            errorTop();
        }
    })
 })

 function editMenu(id)
    {
        $.ajax({
        type: "POST",
        url: "{{route('artikel.create')}}",
        data:{"_token": "{{ csrf_token() }}","id":id},
        beforeSend: function () {
            $('.loader').show();
        },
        success: function(e)
           {
            $('.loader').hide();
            $('#defaultform').hide();
            $('#isiform').html(e);
            }, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').remove();
                errorTop();
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
                url: "{{route('artikel.delete')}}",
                data:{"id":id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e)
                {
                e = jQuery.parseJSON(e);
                    if(e.success == true)
                    {
                        successTop();
                        $('#table_default').DataTable().ajax.reload();
                    }
                }, error: function (xhr, ajaxOptions, thrownError) {
                    $('.loader').remove();
                    errorTop();
                }
                })
            }
        });
    };
</script>
@endsection
