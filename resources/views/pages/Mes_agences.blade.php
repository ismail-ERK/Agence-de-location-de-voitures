@extends('layout.navbar')
@section('titre')
    Les agences
@endsection
@section('content')
<style>
  input{
    visibility: hidden;
  } 
</style>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{asset('imagess/'.$agence->imageAg)}}')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 text-center" style="padding: 10%;color: bl">
            {{ csrf_field() }}



          </div>
        </div>
      </div>
    </div>



    <div class="conatiner" style="margin: 5%">
      <div class="card mb-3" style="width: 1000px;">
        <div class="row g-0">
          
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title">{{$agence->nom_agence}}</h5>
              <p class="card-text">
                Ville : {{$agence->ville}}
              </p>
              <p class="card-text">
                Adresse : {{$agence->adresse}}
              </p>
      
  
            </div>
          </div>
        </div>
      </div>

    

    </div>



<center>

      <iframe src="{{$agence->image360}}"  allowfullscreen="true" frameborder="0" height="500px" width="80%"></iframe>
</center>

  <input type="text" onload="doSomething()" id="latitude" name="latitude" class="form-group col-md-6" value="{{$agence->latitude}}" disabled>
  <input type="text" onload="doSomething()" id="longitude" name="longitude" class="form-group col-md-6" value="{{$agence->longitude}}" disabled>

  <center>
  <!--The div element for the map -->
  <div id="map" style="width :80%; height :500px"></div>
  <script async
  src="https://maps.googleapis.com/maps/api/js?v=3.44
      &key=AIzaSyBy-vKh2q5Uw2BT6Xu4uuvz6p3Qr_DrcU4&callback=initMap">
</script>
  <script >
      var latitude = document.getElementById('latitude').value;
      var longitude = document.getElementById('longitude').value;

      // Initialize and add the map
function initMap() {
// The location of Uluru

const uluru = { lat: parseFloat(latitude), lng: parseFloat(longitude) };
// The map, centered at Uluru
const map = new google.maps.Map(document.getElementById("map"), {
  zoom: 7,
  center: uluru,
});
// The marker, positioned at Uluru
const marker = new google.maps.Marker({
  position: uluru,
  map: map,
});
}

  </script>

</center>




<br>
<br>
<a href="{{ url('infovv')}}" class="btn btn-primary">Nos voitures</a>




<div class="site-section bg-light">
  <div class="container">
    <div class="row">

@if (session()->exists('vv'))

        @foreach ($Voitures as $voiture)
            
       
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="item-1">
              <a href="{{url('infoV/'.$voiture->num_immatriculation)}}" ><img src="{{asset('imagess/'.$voiture->url)}}"  alt="Image" class="img-fluid" width="100%"></a>
              <div class="item-1-contents">
                <div class="text-center">
                <h3><a href="{{url('infoV/'.$voiture->num_immatriculation)}}">{{$voiture->marque}}</a></h3>
                <div class="rating">
                  @for ($i = 0; $i < ceil($voiture->value); $i++)
                  <span class="icon-star text-warning"></span>
@endfor
@for ($j = $voiture->value +1  ; $j <= 5; $j++)
<span class="icon-star text-muted"></span>
@endfor
                </div>
                <div class="rent-price"><span>{{$voiture->prix_jour}}/</span>day</div>
                </div>
                <ul class="specs">
                 
                  <li>
                    <span>Seats</span>
                    <span class="spec">{{$voiture->nombre_places}}</span>
                  </li>
                  <li>
                    <span>Transmission</span>
                    <span class="spec">{{$voiture->transmission}}</span>
                  </li>
                  <li>
                    <span>Couleur</span>
                    <span class="spec">{{$voiture->couleur}}</span>
                  </li>
                </ul>
                <div class="d-flex action">
                  <a href="{{ url('louer/'.$voiture->num_immatriculation)}}" class="btn btn-primary">Rent Now</a>
                </div>
              </div>
            </div>
        </div>

        @endforeach 


        @endif


      </div>
    </div>
  </div>






@include('layout.footer')
    @endsection


  
    
 
    
    