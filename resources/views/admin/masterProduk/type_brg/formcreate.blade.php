<form class="form fv-plugins-bootstrap fv-plugins-framework" role="form" id="form_create" name="form_create" novalidate="novalidate" >{{ csrf_field() }}

<div class="card-body text-sm">
  <div class="col-lg-12">
      <div class="form-group row">
          <label class="col-form-label col-lg-3 col-sm-8">Nama<strong class="text-danger">*</strong></label>
          <div class="col-lg-5 col-md-8 col-sm-12">
            <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-tag"></i>
                  </span>
              </div>
              <input type="text" class="form-control" id="name" name="name"  value="{{$data->name ?? null}}" placeholder="Menu Name">
            </div>
            <span class="form-text text-muted-alert">Referensi Produk</span>
          <div class="fv-plugins-message-container"></div>
          </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-8">Keterangan  <strong class="text-danger">*</strong></label>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <textarea class="form-control" rows="6" placeholder="Enter ..." id="detail" name="detail">
                {!! $data->detail ?? '' !!}
            </textarea>
          </div>
        <span class="form-text text-muted-alert">Ex: Referensi disesuaikan dengan fungsi yang dibutuhkan</span>
        <div class="fv-plugins-message-container"></div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-8">Publish</label>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <select class="form-control select2" style="width: 100%;" name="active" id="active" >
            <option ></option>
            <option value="1"> Active</option>
            <option value="0"> Non Active</option>
            </select>
            <span class="form-text text-muted-alert">Pilih Salah Satu (Default Non Active)</span>
        </div>
      </div>
  </div>
  <input name="id" value="{{$data->id ?? null}}" type="hidden">
  <div class="col-lg-2 float-right">
    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
  </div>
 </div>
</form>

<script>
    $(".select2").select2({
        placeholder: "Pilih",
		allowClear: true
    });

    $(document).ready(function () {
    @if($data)
        var status = "{{$data->active ?? null }}";
        $('#active').val(status).trigger('change');
    @endif

  $.validator.setDefaults({
    submitHandler: function () {
        saveform();
    }
  });
  $('#form_create').validate({
    rules: {
      name: {
        required: true,
        minlength: 4,
        maxlength: 100
      },
    },
    messages: {
      title: {
        required: "Title Tidak Dapat Kosong",

      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

function saveform(){
    $.ajax({
			type: "POST",
			url: "{{route('produk_ref.store')}}",
			data: $("#form_create").serialize(), // serializes the form's elements.
			beforeSend: function () {
                $('.loader').show();
			},
			success: function(data)
			{
                $('.loader').hide();
			 data = jQuery.parseJSON(data);
			 if(data.success == true)
			 {
                $('#form_create')[0].reset();
                successTop();
                $('#modal-form').modal('hide');
                $('#table_default').DataTable().ajax.reload();
                // $('#backItems').trigger('click');

			 }
			}, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').hide();
                if(xhr.status == 403){
                    Swal.fire("Warning!", "Anda tidak memiliki akses untuk melakukan aksi ini", "warning");
                }else if(xhr.status == 404){
                    Swal.fire("Info", "Data tidak ditemukan", "info");
                }else if(xhr.status == 500){
                    Swal.fire("Warning!", "Terjadi kesalahan pada pengisian data, periksa kembali atau hubungi administrator", "warning");
                }else if(xhr.status == 422){
                    Swal.fire("Info", "Data yang anda isi belum lengkap", "info");
                }
            }
  });
}
</script>
