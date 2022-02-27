<div class="card card-primary card-outline" >
  <div class="card-header">
      <h3 class="card-title">Role Menu</h3>
     <div class="card-tools">
          <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="backItems">
          <i class="fa fa-angle-double-left "></i>
              <strong class="col-lg-6">Back list</strong>
          </button>
      </div>
  </div>

  <form class="form fv-plugins-bootstrap fv-plugins-framework" role="form" id="form_akses" name="form_akses" novalidate="novalidate" >
  {{ csrf_field() }}
  <div class="card-body">
    <div class="col-lg-12">
      <div class="form-group row">
          <label class="col-form-label col-lg-3 col-sm-8">Title Menu  <strong class="text-danger">*</strong></label>
          <div class="col-lg-5 col-md-8 col-sm-12">
            <div class="input-group">
              <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="fa fa-tag"></i>
        </span>
              </div>
              <input type="text" class="form-control" id="title" name="title" disabled placeholder="Menu Name" value="{{ $akses->name }}">
            </div>
          </div>
      </div>
      <div class="form-group row">
          <label class="col-form-label col-lg-3 col-sm-8">Publish</label>
          <div class="col-md-4 col-lg-4 col-sm-12">
              <select class="form-control select2" disabled style="width: 100%;" name="status" id="status" >
              <option ></option>
              <option value="Y"> Publish</option>
              <option value="N"> Draf</option>
              </select>
          </div>

      </div>

      <div class="form-group row">
          <label class="col-form-label col-lg-3 col-sm-8">Menus Induks</label>
          <div class="col-md-4 col-lg-4 col-sm-12">
              <select class="form-control select2" style="width: 100%;" id="menus_id">
                  <option></option>
                  @foreach($menusInduks as $x => $v)
                  <option value="{{$x}}">{{ $v }}</option>
                  @endforeach
              </select>
              <span class="form-text text-muted-alert">Pilih menu induks</span>
          </div>

      </div>
    </div>
    <br>
    <div class="clearfix"></div>
    <div class="col-lg-12" id="detailItems"></div>

     <input type="hidden" class="form-control" id="id" name="id" value="{{$akses->id}}">
  </div>
  </form>
  <div class="card-footer">

      <div class="col-lg-2 float-right">
        <button type="button" class="btn btn-block btn-primary" id="btnsave_akses"><i class="fa fa-save"></i> SIMPAN</button>
      </div>
  </div>
</div>

<script>
    $("#menus_id").select2({
        placeholder: "Pilih",
        allowClear: true
    });

    $('#backItems').click(function(){
        $( "#defaultform" ).show();
        $('#isiform').html('');
        $('#table_default').DataTable().ajax.reload();
    });

    $(document).ready(function () {
    var status = "{{ $akses->status }}";
    $('#status').val(status).trigger('change');
    });

    $('#menus_id').change(function(){
        var aksesid = $('#id').val();
    $.ajax({
        type: "POST",
        url: "{{route('akses.detailItems')}}",
        data:{"_token": "{{ csrf_token() }}","id":$(this).val(),"aksesid":aksesid},
        beforeSend: function () {
            $('#detailItems').append('<div class="loader "><div class="loading"></div></div>');
        },
        success: function(e)
            {
                $('.loader').remove();
                $('#detailItems').html(e);
            }, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').remove();
                if(xhr.status == 500){
                    Swal.fire("Warning!", "Terjadi kesalahan Link / Pemanggilan URL", "warning");
                }else {
                    Swal.fire("Info", "Terjadi Kesalahan Sistem", "info");
                }
            }
        })
    })

    $('#btnsave_akses').click(function(){
    var checkView = $('input[name="views[]"]:checked');

    if (checkView.length <= 0 ){
        Swal.fire("Error!", "Tidak Ada Data yang di Cek / Dipilih", "error");
    }else{
        saveform()
    }

    })

    function saveform(){
    $.ajax({
        type: "POST",
        url: "{{route('akses.storePrivateRole')}}",
        data: $("#form_akses").serialize(), // serializes the form's elements.
        beforeSend: function () {
           $('#form_create').append('<div class="loader "><div class="loading"></div></div>');
        },
        success: function(data)
        {
            $('.loader').remove();
            data = jQuery.parseJSON(data);
        if(data.success == true)
        {
            Swal.fire("Success!", "Data Berhasil Disimpan", "success");
            $('#menus_id').val('').trigger('change');

        }
        }, error: function (xhr, ajaxOptions, thrownError) {
            $('.loader').remove();
            if(xhr.status == 403){
                swal.fire("Warning!", "Anda tidak memiliki akses untuk melakukan aksi ini", "warning");
            }else if(xhr.status == 404){
                swal.fire("Info", "Data tidak ditemukan", "info");
            }else if(xhr.status == 500){
                swal.fire("Warning!", "Terjadi kesalahan pada pengisian data, periksa kembali atau hubungi administrator", "warning");
            }else if(xhr.status == 422){
                swal.fire("Info", "Data yang anda isi belum lengkap", "info");
            }
        }
    });
    }

</script>
