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
      <label class="col-form-label col-lg-2 col-sm-8 p-0">Asal Daerah</label>
      <label class="col-form-label col-lg-5 col-sm-8 p-0">: {{$data->city ?? null}}</label>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2 col-sm-8 p-0">No HP / Whatapp</label>
    <label class="col-form-label col-lg-5 col-sm-8 p-0">: {{$data->no_telp ?? null}}</label>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2 col-sm-8 p-0">Status</label>
    <label class="col-form-label col-lg-5 col-sm-8 p-0">:
        @switch($data->status)
        @case (1)
            <span class="badge badge-primary p-2"> Register </span>
        @break
        @case (2)
            <span class="badge badge-success p-2"> Terdaftar </span>
        @break
        @default
            <span class="badge badge-danger p-2"> Ditolak </span>
        @endswitch
    </label>
  </div>
  <div class="form-group row">
      <label class="col-form-label col-lg-2 col-sm-8 p-0">Produk / Hasil Tani</label>
      <div class="col-form-label col-lg-8 col-sm-8 p-0">:
      {{$data->description ?? null}}
      </div>
  </div>
</div>
