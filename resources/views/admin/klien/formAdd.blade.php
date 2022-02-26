<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-list"></i>
        {{ $title }}
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="backList">
               <i class="fa fa-angle-double-left "></i>
               <strong>Back List</strong>
            </button>
        </div>
    </div>
    <div class="card-header text-sm">
        <div class="row">
            <div class="col-lg-3">
                <span>Fhoto / Gambar</span><hr>
                <div class="col-lg-12 box-profile">
                    <div class="text-center mt-2">
                        <img class="profile-user-img  img-circle" style="border:1px solid rgb(236, 232, 232);" src="{{ asset('img/logo2.png') }}" alt="User profile picture" style="width:100px">
                    </div>
                    <br>
                    <div class="form-group text-sm">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="fileimage" name="fileimage">
                          <label class="custom-file-label" for="fileimage">Upload File</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-9">
                <span>Detail Form</span><hr>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Kode <strong class="text-danger">*</strong></label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control " id="code">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Nama Klien / Vendor <strong class="text-danger">*</strong></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control " id="code">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Nama Pemilik <strong class="text-danger">*</strong></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control " id="code">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">No Telp / Hp <strong class="text-danger">*</strong></label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-append" >
                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="text" class="form-control " />

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Alamat <strong class="text-danger">*</strong></label>
                    <div class="col-lg-8">
                        <textarea class="form-control " rows="5"  id="code"></textarea>
                    </div>
                </div>
                <span>Koordinat / Lokasi</span><hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label col-lg-6">Latitude <strong class="text-danger">*</strong></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control " id="code">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label col-lg-6">Longtitude <strong class="text-danger">*</strong></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control " id="code">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label col-lg-6">Tanggal Join <strong class="text-danger">*</strong></label>
                            <div class="col-lg-12">
                                <div class="input-group date" id="startDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input " data-target="#startDate"/>
                                    <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label col-lg-6">Tanggal AKhir <strong class="text-danger">*</strong></label>
                            <div class="col-lg-12">
                                <div class="input-group date" id="startDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input " data-target="#startDate"/>
                                    <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card-footer bg-white">
        <input type="hidden" class="form-control" id="id" name="id" >
        <div class="row">
            <div class="col-lg-10 text-sm">
                <ul class="text-danger">
                    <li>Tanda * file wajib di isi, tidak boleh dikosongkan</li>
                    <li>Pastikan Koordinat Sesuai dengan Map / Google Map</li>
                </ul>
            </div>
            <div class="col-lg-2">
            <button type="submit" class="btn btn-block btn-primary" id="saveForm"><i class="fa fa-save"></i> SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>


    $('#backList').click(function(){
        $('#formContent').html('');
        $('#formDefault').show();
        $('#cari_klik').trigger('click');
    });

    $(function() {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
        });

        $('#saveForm').click(function(){
            $('#backList').trigger('click');
            Toast.fire({
                icon: 'success',
                title: 'Data Berhasil Di tambahkan'
            })
        })
    })

</script>
