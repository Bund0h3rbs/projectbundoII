<form class="form fv-plugins-bootstrap fv-plugins-framework" role="form" id="form_create" name="form_create" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
<input type="hidden" id="id" name="id" value="{{$data->id ?? null}}">
<div class="card card-primary card-outline" >
    <div class="card-header">
        <h3 class="card-title">New Artikel</h3>
       <div class="card-tools">
            <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="backItems">
            <i class="fa fa-angle-double-left "></i>
                <strong class="col-lg-6">Back list</strong>
            </button>
        </div>
    </div>
    <div class="card-body text-sm">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
                <span><i class="fas fa-pencil-alt"></i> Photo Profile</span><hr>
                <div class="row">
                    <label class="col-form-label col-lg-12">Profile</label>
                    <div class="col-lg-12">
                        <div class="col-lg-12 text-center">
                        @php
                         $filename = isset($data->fileimage) ? $data->fileimage : null;
                         $path = asset('img/artikel/'.$filename);
                        @endphp
                        @if($filename != null)
                            <img class="img-fluid mb-3"
                            src="{{ $path }}"
                            alt="User profile picture" style="width:150px">
                        @else
                        <img class="img-fluid mb-3"
                        src="{{ asset('img/bundo.png') }}"
                        alt="User profile picture" style="width:150px">
                        @endif
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileimage" name="fileimage">
                            <label class="custom-file-label" for="fileimage">Upload File</label>
                        </div>
                        <span class="form-text text-muted-alert text-danger">* format gambar jpg, png, jpeg</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <p><b>Note **</b></p>
                        <p>Jika password kosong, <br>Maka Default password <b class="text-danger">U53rBunb0</b></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <span><i class="far fa-copy"></i> Form Pengguna</span><hr>

                <div class="row form-group">
                    <label class="col-form-label col-lg-3">Nama Pengguna <strong class="text-danger">*</strong></label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-tag"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name"  value="{{$data->name ?? null}}" placeholder="Menu Name">
                      </div>
                      <span class="form-text text-muted-alert">Nama akses aplikasi</span>
                    <div class="fv-plugins-message-container"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-lg-3">Email <strong class="text-danger">*</strong></label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="email" name="email"  value="{{$data->email ?? null}}" placeholder="email">
                      </div>
                      <span class="form-text text-muted-alert">Nama akses aplikasi</span>
                    <div class="fv-plugins-message-container"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-lg-3">Jenis Kelamin</label>
                    <div class="col-md-4"><div class="input-group">
                        <select class="form-control select2" style="width: 100%;" name="gender" id="gender" required>
                        <option ></option>
                        @foreach ($jenkel as $x => $val)
                            <option value="{{$x}}">{{$val}}</option>
                        @endforeach
                        </select>
                    </div></div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-lg-3">Agama</label>
                    <div class="col-md-4"><div class="input-group">
                        <select class="form-control select2" style="width: 100%;" name="religion" id="religion" >
                        <option ></option>
                        @foreach ($agama as $x => $val)
                            <option value="{{$x}}">{{$val}}</option>
                        @endforeach
                        </select>
                    </div></div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-lg-3">Telp</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-phone"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control" id="telp" name="telp"  value="{{$data->telp ?? null}}" placeholder="No Telp">
                      </div>
                    <div class="fv-plugins-message-container"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-lg-3">Status</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select class="form-control select2" style="width: 100%;" name="active" id="active" required>
                            <option ></option>
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-lg-12">Alamat</label>
                    <div class="col-md-12">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="address" id="address" placeholder="Place some text here" >
                            {!! $data->description ?? '' !!}
                        </textarea>
                    </div>
                </div>
                <dt> INFORMASI LOGIN</dt>
                <hr>
                <div class="row form-group">
                    <label class="col-form-label col-lg-3">Type Akses</label>
                    <div class="col-md-4"><div class="input-group">
                        <select class="form-control select2" style="width: 100%;" name="akses_id" id="akses_id" required>
                        <option ></option>
                        @foreach ($akses as $x => $val)
                            <option value="{{$x}}">{{$val}}</option>
                        @endforeach
                        </select>
                    </div></div>
                </div>
                <div class="row">
                    <label class="col-form-label col-lg-3">Password </label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Menu Name">
                      </div>
                      <span class="form-text text-muted-alert">Masukan Password Pengguna</span>
                    <div class="fv-plugins-message-container"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-lg-2 float-right">
            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
        </div>
    </div>
</div>
</form>
{{-- {{ dd($data->akses->akses_id)}} --}}

<script>
    $('#backItems').click(function(){
        $("#defaultform" ).show();
        $('#isiform').html('');
        $('#table_default').DataTable().ajax.reload();
    });

    $(".select2").select2({
        placeholder: "Pilih",
        allowClear: true
    });

    $('#start_date').datetimepicker({
    format: 'DD-MM-YYYY'
    })


  $(document).ready(function () {
    @if($data)
        var status = "{{$data->active ?? null }}";
        $('#gender').val('{{$data->gender ?? null}}').trigger('change');
        $('#akses_id').val('{{$data->akses->akses_id ?? null}}').trigger('change');
        $('#active').val('{{$data->active ?? null}}').trigger('change');
        $('#religion').val('{{$data->religion ?? null}}').trigger('change');
        $('#address').val('{{$data->address ?? null}}');
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
      email: {
        required: true,
        email: true,
      },

      active: {
        required: true,
      },

    },
    messages: {
      name: {
        required: "Masukan nama pengguna",
      },

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
    var formData = new FormData($('#form_create')[0]);
    $.ajax({
		type: 'POST',
        url: "{{route('usr_adm.store')}}",
		data: formData,
		async: false,
		cache: false,
		contentType: false,
	    processData: false,
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
                $('#isiform').html('');
                $("#defaultform" ).show();
                $('#table_default').DataTable().ajax.reload();
                // $('#backItems').trigger('click');
			 }else{
                 swal.fire('Warning',data.pesan,'error');
             }
			}, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').hide();
                errorPop();
            }
  });
}
</script>
