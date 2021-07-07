@extends('layouts.app3')
@section('title')
    info agence
@endsection

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        @foreach ($agences as $agence)

          <div class="row align-items-center">
            <div class="col-lg-12">
            <form class="trip-form"  method="POST" >
            
              <div class="row align-items-center mb-9">
                <div class="col-md-4">
                  <h3 class="m-11"></h3>
                </div>
                <div class="col-md-4 text-md-center">
                  <span class="text-primary"></span> <span><h3 class="m-11">l'agence {{$agence->nom}}</h3></span></span>
                </div>
                
              </div>
              <div class="row" >
                <div class="form-group col-md-3" >
                  <label for="cf-1">Nom</label>
                  <input  style="border-style: solid"type="text"  value="{{$agence->nom}}" name="nom" id="cf-1" class="form-control" disabled>
                </div>
               
                <div class="form-group col-md-3">
                  <label for="cf-2">Ville</label>
                  <input  style="border-style: solid"type="text" name="ville" id="cf-2"  value="{{$agence->ville}}" class="form-control" disabled>
                </div>
               
                  <div class="form-group col-md-3">
                    <label for="cf-4">Adresse</label>
                    <textarea style="border-style: solid"  name="adresse" id="cf-4"class="form-control"  id="exampleFormControlTextarea1"rows="3"disabled>{{$agence->adresse}}
                    </textarea>
                  </div>
                   
                  
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">   
                  <a  href="{{URL::to('/agence')}}"class="btn btn-secondary"> <span>Annuler</a>

                      <a  href="{{URL::to('showAgence/deleteAgence/'.$agence->id_agence)}}" class="btn btn-primary"> <span>Supprimer</a>
                        <a  href="{{URL::to('showAgence/updateAgence/'.$agence->id_agence)}}" class="btn btn-primary"> <span>Modifier</a>

                    </div>
              </div>
          </div>
                {{-- <div class="form-group col-md-3">   
                  <div class="col-lg-6">

                    <a href="{{URL::to('/voiture')}}" class="btn btn-primary"> <span>Annuler</a>
                  </div>
                </div> --}}
              </form>
            </div>
          </div>
        </div>
       
      </div>
    
      <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Nos <b>Voitures</b></h2>
                        </div>
                        {{-- <div class="col-sm-7">
                            <a href="add_voiture/{{$agence->id_agence}}" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Ajouter une nouvelle voiture dans cette Agence</span></a>
                            {{-- <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>						 --}}
                        {{-- </div>  --}}
                    </div>
                </div> @endforeach
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Marque</th>						
                            <th>Modele</th>
                            <th>Annee</th>
                            <th>Couleur</th>
                            <th>Categorie</th>
                            <th>Transmission</th>
                            <th>Nombre de portes</th>
                            <th>Nombre de places</th>
                            <th>Prix /jours</th>
                            <th>Nombre de locations</th>
                            <th>Etat</th>
                            <th>modifie depuis</th>
                            <th>voir</th>
                            <th>Mise a jour</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($voitures as $voiture)
                      <tr>
                        <td>{{$voiture->num_immatriculation}}</td>
                        <td>{{$voiture->marque}}</td>   
                        <td>{{$voiture->modele}}</td>
                        <td>{{$voiture->annee}}</td>
                        <td>{{$voiture->couleur}}</td>
                        <td>{{$voiture->categorie}}</td>
                        <td>{{$voiture->transmission}}</td>
                        <td>{{$voiture->nombre_portes}}</td>
                        <td>{{$voiture->nombre_places}}</td>
                        <td>{{$voiture->prix_jour}}</td>
                        <td>{{$voiture->nombre_location}}</td>
                       @if ($voiture->disponible==0)
                       <td><span class="status text-danger">&bull;</span>non disponible</td>
                       @else
                       
                       <td><span class="status text-success">&bull;</span>disponible</td>
                       
                       @endif
                          <td>{{\Carbon\Carbon::parse($voiture->updated_at)->diffForHumans()}}</td>
                        <td>  <a href= "{{URL::to('showCar/'.$voiture->num_immatriculation)}}" class="eyes" title="Modifier Voiture" data-toggle="tooltip"><span class="material-icons">
                            remove_red_eye  </span> <td>
                            
                          <a href="{{URL::to('showCar/updateVoiture/'.$voiture->num_immatriculation)}}"  class="settings" title="Modifier Voiture" data-toggle="tooltip"><span class="material-icons">
                            border_color
                            </span>                 
                                   <a  href="{{URL::to('showCar/deleteVoiture/'.$voiture->num_immatriculation)}}" class="delete" title="Supprimer Voiture" data-toggle="tooltip"><i class="material-icons">delete</i></a>
                        </td>
    
                    </tr>
                 
                    </tbody>
                    @endforeach
                </table>
                <div class="clearfix">
                    {{-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> --}}
                    <ul class="pagination">
                        <li>{{ $voitures->links() }}</li>
                     </ul>
                </div>
            </div>
            <br>
            <br>
            <h2> la Localisation de l'agence</h2>
            <div class="form-group col-md-3">
              <label for="cf-4">Longitude</label>
              <textarea style="border-style: solid" onload="doSomething()"  name="adresse" id="longitude"class="form-control"  id="exampleFormControlTextarea1"rows="3"disabled>{{$agence->longitude}}
              </textarea>
            </div>
            <div class="form-group col-md-3">
              <label for="cf-4">Latitude</label>
              <textarea style="border-style: solid" onload="doSomething()" name="adresse" id="latitude"class="form-control"  id="exampleFormControlTextarea1"rows="3"disabled>{{$agence->latitude}}
              </textarea>
            </div>
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
     
        <div class="col-lg-4">
         
          <div class="card" style="width: 18rem;">
            <img  src="{{asset('imagess/'.$agence->imageAg) }}" class="card-img-top" alt="...">
            <div class="card-body">
              
            </div>
          </div>
        </div>
       </div>
        
      
        <div class="row">

        <h2> les images 360</h2>
        </div>
        <div class="row">
              <iframe height="350px" width="100%" allowfullscreen="true" 
              src="{{$agence->image360}}"  style="display: block"> </iframe>
      </div>
    </div>
  </div>

  <!-- Single item -->
 

  
</div>
<!-- Inner -->
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