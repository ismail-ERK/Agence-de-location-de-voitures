@extends('layouts.app4')
@section('title')
    agence
@endsection

@section('content')
{{-- @if (Session::has('success'))
<script>
     swal("SUPRESSSION","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 
    
@endif --}}
@if (Session::has('success'))
 <script>
     swal("SUPRESSSION","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 
  {{Session::put('success',null)}}
  @endif
<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">

  </div>
</div>
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h3>NOS AGENCES</h3>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
        <p>
          <a href="#" class="btn btn-primary custom-prev">Previous</a>
          <span class="mx-2">/</span>
          <a href="#" class="btn btn-primary custom-next">Next</a>
        </p>
        <div class="d-flex action" >
          <a href="{{URL::to('/add_agence')}}"class="btn btn-primary">Ajouter une nouvelle agence </a>
        </div>
      </div>
      <div class="col-lg-9">


        <div class="nonloop-block-13 owl-carousel">

          @foreach ($agences as $agence)
<div class="item-1">
  <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
  <div class="item-1-contents">
    <div class="text-center">
    <h3><a href="#"> {{$agence->nom}}</a></h3>
    <div class="rating">
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
    </div>
    <div class="rent-price"><span> {{$agence->ville}}</span></div>
    </div>
    <ul class="specs">
      <li>
        <span >Adresse:</span>
        <span class="spec"></span>
      </li>
      <li>
        <span>{{$agence->adresse}}</span>
        <span class="spec"></span>
      </li>
     
        
        
        
      
     
    </ul>
    <div class="d-flex action" >
      <a href="showAgence/{{$agence->id_agence}}"class="btn btn-primary">Afficher </a>
    </div>
    {{-- <div class="d-flex action">
      <a href="contact.html" class="btn btn-primary">Supprimer</a>
    </div> --}}
  </div>
</div>
@endforeach

          

    </div>
  </div>

  </div>
  
</div>



</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>

</body>

</html>

          
@endsection