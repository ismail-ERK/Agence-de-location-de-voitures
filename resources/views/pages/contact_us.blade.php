@extends('layout.navbar')
@section('titre')
    Contact us
@endsection
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (Session::has('send'))
 <script>
     swal("SEND","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 

  @endif
<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('images/hero_2.jpg')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 text-center">
            <h1>Contact Us</h1>
        
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light" id="contact-section">
    <div class="container">
      <div class="row justify-content-center text-center">
      <div class="col-7 text-center mb-5">
        <h2>Nous contacter</h2>
<p>« Nous donnons de l’importance et répondons à toutes les demandes de nos clients. Nous serons ravis de traiter la vôtre ! »</p> 
<p>N'hésitez pas de nous contacter !</p>    
     </div>
</div>
      <div class="row">
        <div class="col-lg-8 mb-5" >
          <form action="{{url('sendContact')}}" method="get">
            <div class="form-group row">
              <div class="col-md-6 mb-4 mb-lg-0">
                <input type="text" class="form-control" placeholder="First name" name="First_name" required>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Last name"  name="Last_name" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <input type="text" name="email" class="form-control" placeholder="Email address"  placeholder="mail" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <textarea name="msg" id="" class="form-control" placeholder="Write your message." cols="30" rows="10" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 mr-auto">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4 ml-auto">
          <div class="bg-white p-3 p-md-5">
            <h3 class="text-black mb-4">Contact Info</h3>
            <ul class="list-unstyled footer-link">
              <li class="d-block mb-3">
                <span class="d-block text-black">Address:</span>
                <span>901 Avenue Allal El fassi,  40000 Marrakech</span></li>
              <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+212 610 648 424</span></li>
              <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>erroukismail@gmail.com</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


  

  @include('layout.footer')


  </div>


@endsection