<form class="form fv-plugins-bootstrap fv-plugins-framework" role="form" id="form_create" name="form_create" novalidate="novalidate" >
{{ csrf_field() }}
<div class="card card-primary card-outline" >
    <div class="card-header">
        <h3 class="card-title">Create Menu</h3>
       <div class="card-tools">
            <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="backItems">
            <i class="fa fa-angle-double-left "></i>
                <strong class="col-lg-6">Back list</strong>
            </button>
        </div>
    </div>
    <div class="card-body text-sm">
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
                <input type="text" class="form-control" id="name" name="name"  value="{{$data->name ?? null}}" placeholder="Menu Name">
              </div>
            <span class="form-text text-muted-alert">Nama menu, disesuaikan kebutuhan</span>
			<div class="fv-plugins-message-container"></div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Parent</label>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <select class="form-control select2" style="width: 100%;" name="parent" id="parent">
                    <option></option>
                    @foreach($menus as $x => $v)
                    <option value="{{$x}}">{{ $v }}</option>
                    @endforeach
                </select>
                <span class="form-text text-muted-alert">Pilih Jika Menu merupakan Submenu dari menu Lainnya</span>
             </div>


        </div>
		<div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-8">Icon</label>
            <div class="col-lg-4 col-md-8 col-sm-12">
              <div class="input-group">
                <div class="input-group-prepend">
					<span class="input-group-text">
				    	<i class="fa fa-smile"></i>
					</span>
                </div>
                <input type="text" class="form-control" id="icon" name="icon" value="{{$data->icon ?? null}}" placeholder="Ex : fa fa-home">
              </div>
            <span class="form-text text-muted-alert">Ex: Fa fa-home, flaticon-home dll</span>

            </div>
        </div>
		<div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-8">Module  </label>
            <div class="col-lg-4 col-md-8 col-sm-12">
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" id="modul" name="modul" value="{{$data->modul ?? null}}" placeholder="karyawan">
              </div>
            <span class="form-text text-muted-alert">Ex: karyawan ( huruf kecil semua )</span>
			<div class="fv-plugins-message-container"></div>
            </div>
        </div>
		<div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-8">Link</label>
            <div class="col-lg-4 col-md-8 col-sm-12">
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" id="link" name="link" value="{{$data->link ?? null}}" placeholder="listkaryawan">
              </div>
            <span class="form-text text-muted-alert">Ex: menus ( huruf kecil semua )</span>
			<div class="fv-plugins-message-container"></div>
            </div>
        </div>
		<div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-8">No Urut  <strong class="text-danger">*</strong></label>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input type="number" class="form-control" id="no_urut" name="no_urut"  value="{{$data->no_urut ?? null}}" placeholder="ex : 1">
              </div>
            <span class="form-text text-muted-alert">Ex: 1,2,3</span>
			<div class="fv-plugins-message-container"></div>
            </div>
        </div>
		<div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-8">Publish</label>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <select class="form-control select2" style="width: 100%;" name="status" id="status" >
                <option ></option>
                <option value="Y"> Publish</option>
                <option value="N"> Draf</option>
                </select>
                <span class="form-text text-muted-alert">Pilih salah satu (default Draf)</span>
            </div>
        </div>
      </div>
    </div>

    <div class="card-footer">
        <input name="id" value="{{$data->id ?? null}}" type="hidden">
        <div class="col-lg-2 float-right">
          <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
        </div>
    </div>
</div>

</form>
<script>
    $("#status").select2({
        placeholder: "Pilih",
		allowClear: true
    });

    $("#parent").select2({
        placeholder: " Parent",
		allowClear: true
	});

    $('#backItems').click(function(){
        $( "#defaultform" ).show();
        $('#isiform').html('');
        $('#table_default').DataTable().ajax.reload();
    });

$(document).ready(function () {
    @if($data)
        var parent = "{{$data->parent ?? null }}";
        var status = "{{$data->status ?? null }}";
        $('#parent').val(parent).trigger('change');
        $('#status').val(status).trigger('change');
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

      no_urut: {
        required: true,
        number: true
      },
    },
    messages: {
      title: {
        required: "Title Tidak Dapat Kosong",

      },

      no_urut:{
          required: "No Harap Diisi",
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
			url: "{{route('menu.store')}}",
			data: $("#form_create").serialize(), // serializes the form's elements.
			beforeSend: function () {
                $('#form_create').append('<div class="loader "><div class="loading"></div></div>');
			},
			success: function(data)
			{
                $('.loader').remove();
			 data = jQuery.parseJSON(data);
			 if(data.success == true)
			 {
                $('#form_create')[0].reset();
                Swal.fire("Success!", "Data Berhasil Disimpan", "success");
                $('#backItems').trigger('click');

			 }
			}, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').remove();
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
