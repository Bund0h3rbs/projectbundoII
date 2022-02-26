@extends('template.template-admin')

@section('content')
<style>
    .info-box {
        min-height:auto;
    }
    .info-box .info-box-icon{
        width: 50px;height:50px;
        font-size: 1.5rem;
    }

</style>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3 ">
        <div class="info-box" onclick="administratif_klik(1)" id="provinsi">
            <span class="info-box-icon bg-primary elevation-1">
              <i class="fas fa-home"></i>
            </span>
          <div class="info-box-content">
            <span class="info-box-text">Provinsi</span>
          </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box" onclick="administratif_klik(2)" id="provinsi">
            <span class="info-box-icon bg-danger elevation-1" >
              <i class="fas fa-home"></i>
            </span>
          <div class="info-box-content">
            <span class="info-box-text">Kabupaten / Kota</span>
          </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box" onclick="administratif_klik(3)">
            <span class="info-box-icon bg-info elevation-1">
              <i class="fas fa-home"></i>
            </span>
          <div class="info-box-content">
            <span class="info-box-text">Kecamatan</span>
          </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box" onclick="administratif_klik(4)">
            <span class="info-box-icon bg-orange elevation-1">
              <i class="fas fa-home"></i>
            </span>
          <div class="info-box-content">
            <span class="info-box-text">Kelurahan / Desa</span>
          </div>
        </div>
    </div>
</div>
<div class="row" id="form-datalist">
</div>
<script>
    $(function(){
        $('#provinsi').trigger('click');
    })
    function administratif_klik(id){
        var url = "{{ route('lokasi.type')}}";
        $.ajax({
              type:'POST',
              url: url,
              data: {
               "_token": "{{ csrf_token() }}",
                "type":id,
              },
              beforeSend: function () {
                $('#form-datalist').append('<div class="loader "><img src="{{asset("img/loading.gif")}}" class="img_load"></div>');
              },
              success: function(response) {
                  $('.loader').remove();
               $('#form-datalist').html(response);
              }
          })
    };
</script>
@endsection
