@extends('layouts.app3')
@section('title')
    info agence
@endsection

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
  
.card-img-top{
  max-height: 200px;
}
</style>
@if (Session::has('update'))
 <script>
     swal("Modification","{!! Session::get('update') !!}","update",{
    button:"ok",})
 
    </script> 

  {{Session::put('update',null)}}
  @endif
  <div id="content" >
  <div class="news">
    <div class="container">
 @foreach ($voitures as $voiture)
  
 
      <div class="row align-items-center">
        <div class="col-lg-12">
        <form class="trip-form" method="POST" >
           
          <div class="row align-items-center mb-9">
            <div class="col-md-4">
              <h3 class="m-11"></h3>
            </div>
            <div class="col-md-4 text-md-center">
              <span class="text-primary"></span> <span><h3 class="m-11">la voiture {{$voiture->marque }} {{$voiture->modele }} </h3></span></span>
            </div>
            
          </div>
          <div class="row" >
            <div class="form-group col-md-3" >
              <label for="cf-1">Numero d'immatriculation</label>
              <input  style="border-style: solid"type="text" name="num_immatriculation" id="cf-1"  value="{{$voiture->num_immatriculation}}" class="form-control" disabled>
            </div>
           
            <div class="form-group col-md-3">
              <label for="cf-2">Marque</label>
              <input  style="border-style: solid"type="text" name="marque" id="cf-2" value="{{$voiture->marque}}"  class="form-control" disabled>
            </div>
            <div class="form-group col-md-3">
              <label for="cf-3">Modele</label>
              <input style="border-style: solid" type="text" name="modele" id="cf-3" value="{{$voiture->modele}}"  class="form-control"disabled>
            </div>
            <div class="form-group col-md-3">
              <label for="cf-3">Annee</label>
              <input style="border-style: solid" type="text" name="annee" id="cf-3" value="{{$voiture->annee}}"  class="form-control"disabled>
            </div>
            <div class="form-group col-md-3">
              <label for="cf-4">couleur</label>
              <input style="border-style: solid" type="text" name="couleur" id="cf-4" value="{{$voiture->couleur}}"   class="form-control"disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="cf-4">Transmission</label>
                <input  style="border-style: solid"type="text" name="transmission" id="cf-4" value="{{$voiture->transmission}}"  class="form-control"disabled>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">Nombre de place</label>
                <input style="border-style: solid" type="number" name="nombre_places" id="cf-4"  value="{{$voiture->nombre_places}}" class="form-control"disabled>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">Nombre de portes</label>
                <input style="border-style: solid"type="number" name="nombre_portes" id="cf-4" value="{{$voiture->nombre_portes}}"  class="form-control"disabled>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">prix_jour</label>
                <input style="border-style: solid"type="number" name="prix_jour" value="{{$voiture->prix_jour}}"  id="cf-4" class="form-control"disabled>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">nombre de locations</label>
                <input style="border-style: solid"type="number" name="nombre_location" value="{{$voiture->nombre_location}}"  id="cf-4" class="form-control"disabled>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">disponibilité</label>
                @if ($voiture->disponible==0)
                <input style="border-style: solid"type="text" name="disponible" value="Non"  id="cf-4" class="form-control"disabled>
                @else
                
                <input style="border-style: solid"type="text" name="disponible" value="Oui" id="cf-4" class="form-control"disabled>
                
                @endif
              </div>
            

              <div class="form-group col-md-3">
              </div>
            {{-- <div class="form-group col-md-3">   
              <div class="col-lg-6">
                <input type="submit" value="Ajouter" class="btn btn-primary">
              </div>
            </div> --}}
           
           
           
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">   
                  <a  href="{{URL::to('/voiture')}}"class="btn btn-secondary"> <span>Annuler</a>

                      <a  href="{{URL::to('showCar/deleteVoiture/'.$voiture->num_immatriculation)}}" class="btn btn-primary"> <span>Supprimer</a>
                        <a  href="{{URL::to('showCar/updateVoiture/'.$voiture->num_immatriculation)}}" class="btn btn-primary"> <span>Modifier</a>

                    </div>
              </div>
          </div>
          </form>
        </div>
      </div>
      <div
id="carouselMultiItemExample"
class="carousel slide carousel-dark text-center"
data-mdb-ride="carousel">
<br><br><br>
<div class="carousel-inner py-4">
  <!-- Single item -->
  <div class="carousel-item active">
    <div class="container">
      <div class="row">

        <h2> les images normales</h2>
        </div>
      

      <div class="row">
        @if (count($images) < 0)
<h1>Pas d'images normales pour cette Voitures</h1>
@else
@foreach ($images as $image)
        <div class="col-lg-4">
         
          <div class="card" style="width: 18rem;">
            <img  src="{{asset('imagess/'.$image->url) }}" class="card-img-top" alt="...">
            <div class="card-body">
              
            </div>
          </div>
        </div>
        @endforeach</div>
@endif
        
      
        <div class="row">

        <h2> les images 360</h2>
        </div>
        <div class="row">
          

        @foreach ($images360 as $image360)

         

              <iframe height="350px" width="100%" allowfullscreen="true" 
              src="{{$image360->url}}"  style="display: block"> </iframe>
        @endforeach

        
     
      </div>
    </div>
  </div>

  <!-- Single item -->
 

  
</div>
<!-- Inner -->
</div>
    @endforeach
  </div>
</div>
</div>
       <!-- Carousel wrapper -->

  
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