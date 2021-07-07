@extends('layouts.app4')
@section('title')
    voiture
@endsection

@section('content')
@if (Session::has('delete'))
 <script>
     swal("SUPRESSSION","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 
  {{Session::put('delete',null)}}
  @endif
<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">
    
  </div>




<div class="site-section bg-light">
 
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h3>NOS VOITURES</h3>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
        <p>
          <a href="#" class="btn btn-primary custom-prev">Previous</a>
          <span class="mx-2">/</span>
          <a href="#" class="btn btn-primary custom-next">Next</a>
        </p>
        <div class="d-flex action" >
          <a href="{{URL::to('/add_voiture')}}"class="btn btn-primary">Ajouter une nouvelle voiture </a>
        </div>
      </div>
      <div class="col-lg-9">


        <div class="nonloop-block-13 owl-carousel">

          @foreach ($voitures as $voiture)
<div class="item-1">
  <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
  <div class="item-1-contents">
    <div class="text-center">
    <h3><a href="#">{{$voiture->marque}}</a></h3>
    <div class="rating">
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
      <span class="icon-star text-warning"></span>
    </div>
    <div class="rent-price"><span>{{$voiture->prix_jour}} DH/</span>jour</div>
    </div>
    <ul class="specs">
      <li>
        <span>Modele</span>
        <span class="spec">{{$voiture->modele}}</span>
      </li>
      <li>
        <span>rating value</span>
        <span class="spec">{{$voiture->value}}</span>
      </li>
        <li>
          <span>Transmission</span>
          <span class="spec">{{$voiture->transmission}}</span>
        </li>
        <li>
          <span>couleur</span>
          <span class="spec">{{$voiture->couleur}}</span>
        </li>
        <li>
        <span>Nombre de portes</span>
        <span class="spec">{{$voiture->nombre_portes}}</span>
      </li>
      <li>
        <span>Nombre de places</span>
        <span class="spec">{{$voiture->nombre_places}}</span>
      </li>
     
    </ul>
    <div class="d-flex action" >
      <a href="showCar/{{$voiture->num_immatriculation}}"class="btn btn-primary">Afficher </a>
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