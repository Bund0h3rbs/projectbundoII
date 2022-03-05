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
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Contact</h2>
            <h3><span>Contact Us</span></h3>
            <p>Kami akan membantu dan menjawab pertanyaan anda seputar layanan jasa di tempat kami</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p> Jl Barito IV A No F778 RT 006 RW 007<br>
                    Kel. Jakamulya Kec. Bekasi Selatan <br>
                    Kota Bekasi - Provinsi Jawa Barat <br>
                    17146</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>contact@bundoherbs.com</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p><a href="https://api.whatsapp.com/send/?phone=628556591252&text=https://bundoherbs.com&app_absent=0" target="_blank"> <span>+628 556-591-252</span> </a></p>
              </div>
            </div>

          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-6 ">
              <iframe class="mb-4 mb-lg-0" src="" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div>

            <div class="col-lg-6">
             {{ Form::open(array('route' =>'contact_me.pesan','class'=>'php-email-form','id'=>'form_pesan')) }}
              {{-- <form role="form"  method="POST" class="php-email-form" id="form_pesan"  action="{{route('contact_me.pesan')}}">
                @csrf --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="col form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="description" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="button" class="btn-submit" id="send_button">Send Message</button></div>
              {{-- </form> --}}
              {{Form::close()}}
            </div>

          </div>

        </div>
    </section><!-- End Contact Section -->
</main>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
$('#send_button').click(function(){
    var url  = "{{route('contact_me.pesan')}}";
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
