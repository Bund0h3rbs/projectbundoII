<div class="card-header">
    <h3 class="card-title">
        <i class="fas fa-list"></i>
    List Klien
    </h3>
    <div class="card-tools">
        <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="addItems">
            <strong>Add Items</strong>
           <i class="fa fa-plus col-lg-2"></i>
        </button>
    </div>
</div>
<div class="card-body">
    <table class="table-bordered table-head">
        <thead class="bg-primary">
            <tr >
                <th width="50px">No</th>
                <th width="100px">Action</th>
                <th width="120px">Kode</th>
                <th width="250px">Nama</th>
                <th>Info</th>
                <th>Lokasi</th>
                <th width="150px">Tanggal Join</th>
            </tr>
        </thead>
        <tbody class="text-sm">
        </tbody>
    </table>
</div>

<script>
     $('#addItems').click(function(){
        var url = "{{ route('klien.add')}}";
        $.ajax({
              type:'POST',
              url: url,
              data: {
               "_token": "{{ csrf_token() }}",
              },
              beforeSend: function () {
                $('#formDefault').append('<div class="loader "><img src="{{asset("img/loading.gif")}}" class="img_load"></div>');
              },
              success: function(response) {
                $('.loader').remove();
                $('#formDefault').hide();
                $('#formContent').html(response);
              }
          })
    })
</script>
