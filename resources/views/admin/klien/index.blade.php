@extends('template.template-admin')


@section('content')

<div class="col-lg-12" id="formDefault">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-search"></i>
            Filter Berdasarkan
            </h3>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-form-label col-lg-4">Tanggal Join  <strong class="text-danger">*</strong></label>
                        <div class="col-lg-10">
                            <div class="input-group date" id="startDate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#startDate"/>
                                <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-form-label col-lg-4">Tanggal Akhir  <strong class="text-danger">*</strong></label>
                        <div class="col-lg-10">
                        <div class="input-group">
                            <div class="input-group date" id="endDate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input " data-target="#endDate"/>
                                <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            <div class="col-lg-12">
                <div class="col-lg-2 float-right">
                    <button type="submit" class="btn btn-block btn-primary btn-sm" id="cari_klik">
                        <i class="fas fa-search "></i>
                        <strong>Filter</strong>

                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- table list -->
    <div class="card card-outline card-primary" id="listData"></div>
</div>

<div class="col-lg-12" id="formContent"></div>

<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">

    $('#startDate').datetimepicker({
        format: 'L'
    });

    $('#endDate').datetimepicker({
        format: 'L'
    });

    $(function(){
        $('#cari_klik').trigger('click');
    })

    $('#cari_klik').click(function(){
        var url = "{{ route('klien.getlist')}}";
        $.ajax({
              type:'POST',
              url: url,
              data: {
               "_token": "{{ csrf_token() }}",
              },
              beforeSend: function () {
                $('#formDefault').append('<div class="loader "><img src="{{asset("img/loading.gif")}}" class="img_load"></div>');
              },
              success: function(response) {
                $('.loader').remove();
                $('#listData').html(response);
              }
          })
    });
</script>
@endsection
