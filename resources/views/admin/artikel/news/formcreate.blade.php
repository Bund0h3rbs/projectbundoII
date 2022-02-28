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
                <span><i class="fas fa-pencil-alt"></i> Form Judul</span><hr>
                <div class="row">
                    <label class="col-form-label col-lg-12">Cover</label>
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
                    <label class="col-form-label col-lg-12">Judul Artikel<strong class="text-danger">*</strong></label>
                    <div class="col-lg-12">
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
                <div class="row">
                    <label class="col-form-label col-lg-12">Kategori</label>
                    <div class="col-md-12"><div class="input-group">
                        <select class="form-control select2" style="width: 100%;" name="category_id" id="category_id" required>
                        <option ></option>
                        @foreach ($kategori as $x => $val)
                            <option value="{{$x}}">{{$val}}</option>
                        @endforeach
                        </select>
                    </div></div>
                </div>
                {{-- <div class="row">
                    <label class="col-form-label col-lg-12">Tanggal Pelaksanaan  <strong class="text-danger">*</strong></label>
                    <div class="col-md-12">
                        <div class="input-group date" id="start_date" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#start_date" required id="start_date" name="start_date">
                            <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <span class="form-text text-muted-alert">Tanggal Mulai</span>
                    </div>
                </div> --}}
                <div class="row">
                    <label class="col-form-label col-lg-12">Status</label>
                    <div class="col-md-12">
                        <div class="input-group">
                            <select class="form-control select2" style="width: 100%;" name="active" id="active" required>
                            <option ></option>
                            <option value="1">Publish</option>
                            <option value="0">Draf</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-form-label col-lg-12">Link</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="link" name="link"  value="{{$data->link ?? null}}" placeholder="Link">
                      <span class="form-text text-muted-alert">Tambahkan Jika artikel bukan milik pribadi</span>
                    <div class="fv-plugins-message-container"></div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <span><i class="far fa-copy"></i> Isi Artikel</span><hr>

                <textarea class="form-control textarea" rows="6" placeholder="Enter ..." name="news" id="news" placeholder="Place some text here" >
                    @if($data)
                    {!! $data->news !!}
                    @endif
                </textarea>
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


<script>
    $('#backItems').click(function(){
        $( "#defaultform" ).show();
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
        $('#category_id').val({{$data->category_id ?? null}}).trigger('change');
        $('#active').val(status).trigger('change');
    @endif

    $('.textarea').summernote({
        minHeight: 400
    })
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
      category_id: {
        required: true,
      },
      active: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Masukan Judul artikel",
      },
      category_id: {
        required: "Pilih Salah Satu",
      },
      category_id: "Please accept our terms"
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
        url: "{{route('artikel.store')}}",
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

			 }
			}, error: function (xhr, ajaxOptions, thrownError) {
                $('.loader').hide();
                errorPop();
            }
  });
}
</script>
