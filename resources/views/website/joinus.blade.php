@extends('template.website')

@section('content')
<style>
    .btn-submit{
        background: #0d9b54;
        border: 0;
        padding: 10px 30px;
        color: #fff;
        transition: .4s;
        border-radius: 4px;
    }
</style>
<main id="main" data-aos="fade-up">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Join Us</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Mitra</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="contact" class="contact"style="padding-top:10px">
      <div class="container pt-0">
        <div class="alert alert-success">
            Dengan berkolaborasi bersama <b>bundoherbs</b>, kita turut mendorong petani Daerah untuk dapat berkompetitor dalam pemasaran produk, baik luar negeri dan dalam negeri.
        </div>
        <div class="row" style="padding-top:20px">
            <div class="col-lg-5">

            </div>
            <div class="col-lg-7">
                <h5>Formulir Pendaftaran</h5><hr>
                {{ Form::open(array('route' =>'join_us.register','class'=>'php-email-form','id'=>'form_pesan')) }}

                <div class="row" >
                    <div class="form-group row"  style="padding:10px">
                        <label class="col-lg-3">Nama</label>
                        <div class="col-lg-8">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                    </div>
                    <div class="form-group row"  style="padding:10px">
                        <label class="col-lg-3">Email</label>
                        <div class="col-lg-8">
                        <input type="text" name="email" class="form-control" id="email" placeholder="user@bundo.com" required>
                        </div>
                    </div>
                    <div class="form-group row"  style="padding:10px">
                        <label class="col-lg-3">Asal Daerah</label>
                        <div class="col-lg-8">
                        <input type="text" name="city" class="form-control" id="city" placeholder="Asal Daerah" required>
                        </div>
                    </div>

                    <div class="form-group row"  style="padding:10px">
                        <label class="col-lg-3">No Telp</label>
                        <div class="col-lg-8">
                        <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="Phone Number" required>
                        <span class="text-sm text-muted">Masukan No Telp / Whatapp</span>
                        </div>
                    </div>
                    <div class="form-group row"  style="padding:10px">
                        <label class="col-lg-3">Produk / Hasil Tani</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="description" rows="5" placeholder="Produk" required></textarea>
                        <span class="text-sm text-muted">Tulis produk / Hasil tani yang akan di pasarkan</span>
                        </div>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message text-sm"></div>
                        <div class="sent-message ">Your message has been sent. Thank you!</div>
                      </div>
                    <div class="text-center"><button type="button" class="btn-submit" id="send_button">Kirim Formulir </button></div>

                </div>
                {{Form::close()}}

            </div>
        </div>
      </div>
    </section>
</main>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
$('#send_button').click(function(){
    var url  = "{{route('join_us.register')}}";
    var data =  $('#form_pesan').serialize();

    send_contact_mail(url,data);
})

function send_contact_mail(url,formData)
{
    var thisForm = $('#form_pesan')
    $.ajax({
		type: "POST",
        url: url,
		data: formData,
      beforeSend: function () {
        thisForm.find('.loading').addClass('d-block');
        thisForm.find('.error-message').removeClass('d-block');
        thisForm.find('.sent-message').removeClass('d-block');
      },
      success: function(data)
	  {
        thisForm.find('.loading').removeClass('d-block');
        data = jQuery.parseJSON(data);
        if(data.success == true)
        {
            thisForm.find('.error-message').removeClass('d-block');
            thisForm.find('.sent-message').addClass('d-block');
            thisForm[0].reset();
            location.reload();
        }else{
            thisForm.find('.error-message').addClass('d-block');
            thisForm.find('.sent-message').removeClass('d-block');
            thisForm.find('.error-message').html("Terdapat Kesalahan Data");

        }
        // displayError(thisForm, error);
      }, error: function (xhr, ajaxOptions, thrownError) {
        thisForm.find('.loading').removeClass('d-block');
        thisForm.find('.error-message').innerHTML = "Terdapat Kesalahan Data";
        thisForm.find('.sent-message').removeClass('d-block');
        thisForm.find('.error-message').addClass('d-block');
      }

    });
    // form.submit();
}
</script>
@endsection
