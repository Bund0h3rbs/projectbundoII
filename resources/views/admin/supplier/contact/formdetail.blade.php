<div class="card-body text-sm">
  <div class="form-group row">
      <label class="col-form-label col-lg-2 col-sm-8 p-0">Nama</label>
      <label class="col-form-label col-lg-5 col-sm-8 p-0">: {{$data->name ?? null}}</label>
  </div>
  <div class="form-group row">
      <label class="col-form-label col-lg-2 col-sm-8 p-0">Email</label>
      <label class="col-form-label col-lg-5 col-sm-8 p-0">: {{$data->email ?? null}}</label>
  </div>
  <div class="form-group row">
      <label class="col-form-label col-lg-2 col-sm-8 p-0">Subject</label>
      <label class="col-form-label col-lg-5 col-sm-8 p-0">: {{$data->subject ?? null}}</label>
  </div>
  <div class="form-group row">
      <label class="col-form-label col-lg-2 col-sm-8 p-0">Isi Pesan</label>
      <div class="col-form-label col-lg-8 col-sm-8 p-0">:
      {{$data->description ?? null}}
      </div>
  </div>
</div>
