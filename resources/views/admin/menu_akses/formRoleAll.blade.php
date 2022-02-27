
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
              <input type="text" class="form-control" id="title" name="title" disabled placeholder="Menu Name" value="{{ $akses->title }}">
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
    </div>
    <br>
    <div class="clearfix"></div>

    <div class="col-lg-12">
    <hr>
    <h5 >Role Akses Menu</h5><hr>
      <div class="table-responsive text-sm">
      <table class="table table-bordered table-striped"  id="table_akses">
          <thead class="bg-primary">
              <tr>
                  <th width="30px" >No</th>
                  <th >Akses</th>
                  <th width="100px" >Views</th>
                  <th width="100px" >Create</th>
                  <th width="100px" >Update</th>
                  <th width="100px" >Delete</th>
              </tr>
          </thead>
          <tbody>
          @if(count($menus) < 0 )
              <tr>
               <td colspan="6" align="center"> <span class="text-danger"> Data Tidak Ditemukan Harap Tambahkan Akses Terlebih Dahulu</span></td>
              </tr>
          @else
          @php($i = 0)
          @foreach($menus as $mn_id => $value)
          <?php
              $role = \App\Models\Menus_rolemenus::where(['menus_id'=> $mn_id ,'akses_id'=>$akses->id])->first();


          ?>
              <tr >
               <td >{{++$i}}</td>
               <td ><strong >{{ $value }}</strong>
               </td>
               <td align="center"><div class="icheck-primary d-inline">
                      <input type="checkbox" name="views[]" id="checkViews_{{$i}}" value="{{$mn_id}}"
                      <?php if(!empty($role->views) and $role->views=='1'){ echo "checked";} ?>>
                      <label for="checkViews_{{$i}}">
                      </label>
                    </div></td>
               <td align="center"><div class="icheck-primary d-inline">
                      <input type="checkbox" name="creator[]" id="checkCreate_{{$i}}"
                      <?php if(!empty($role->creator) and $role->creator=='1'){ echo "checked";} ?> >
                      <label for="checkCreate_{{$i}}">
                      </label>
                    </div>
               </td>
               <td align="center"><div class="icheck-primary d-inline">
                      <input type="checkbox" name="updater[]" id="checkUpdate_{{$i}}"
                      <?php if(!empty($role->updater) and $role->updater=='1'){ echo "checked";} ?>>
                      <label for="checkUpdate_{{$i}}">
                      </label>
                    </div>
               </td>
               <td align="center"><div class="icheck-primary d-inline">
                      <input type="checkbox" name="deleted[]" id="checkDelete_{{$i}}"
                      <?php if(!empty($role->deleted) and $role->deleted=='1'){ echo "checked";} ?>>
                      <label for="checkDelete_{{$i}}">
                      </label>
                    </div>
               </td>
              </tr>
          @endforeach
          @endif
          </tbody>
      </table>
      </div>
    </div>
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
  $('#backItems').click(function(){
      $( "#defaultform" ).show();
      $('#isiform').html('');
      $('#table_default').DataTable().ajax.reload();
  });

    $(document).ready(function () {

    var status = "{{ $akses->status }}";
    $('#status').val(status).trigger('change');

    });

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
        url: "{{route('akses.storeAllAkses')}}",
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
                $('#form_akses')[0].reset();
                Swal.fire("Success!", "Data Berhasil Disimpan", "success");
                $('#backItems').trigger('click');

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
