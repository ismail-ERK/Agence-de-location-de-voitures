@extends('layout.navbar')
@section('titre')
    Home
@endsection
@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy-vKh2q5Uw2BT6Xu4uuvz6p3Qr_DrcU4&region=mar&sensor=false
    &libraries=places"></script>
    <script>
      const api="https://car-data.p.rapidapi.com/cars/"
const api2 ="https://car-data.p.rapidapi.com/cars?limit=50&page=0&make="
/*
fetch(api, {
	"method": "GET",
	"headers": {
		"x-rapidapi-key": "416dbc74a5msh217b890f50d377ap173f0bjsn35c0e3cc0937",
		"x-rapidapi-host": "car-data.p.rapidapi.com"
	}
})
.then(function(response) {
	return response.json();
}).then(function(data){
  console.log(data)
  document.querySelector("#make").innerHTML= 
  `
  <select class="form-control" onchange="GetModel(this.value)">
   ${

    data.map(data=>`<option>${data.make}</option>`)
   }
   </select>
  `
} 
)

.catch(err => {
	console.error(err);
})
*/
async function getData() {

  const response=await fetch(`${api}makes`, {
    "method": "GET",
    "headers": {
      "x-rapidapi-key": "416dbc74a5msh217b890f50d377ap173f0bjsn35c0e3cc0937",
      "x-rapidapi-host": "car-data.p.rapidapi.com"
    }
  })
  const data = await response.json();
  
  printData(data)

}

function printData(data) {

  document.querySelector("#marque").innerHTML= 
  `
  <datalist id="test" onchange="GetModel(this.value)">
   ${

    data.map(data=>`<option>${data}</option>`)
   }
   </datalist>
  `
  
}


async function GetModel(e) {
  const response=await fetch(`${api2}${e}`, {
    "method": "GET",
    "headers": {
      "x-rapidapi-key": "416dbc74a5msh217b890f50d377ap173f0bjsn35c0e3cc0937",
      "x-rapidapi-host": "car-data.p.rapidapi.com"
    }

  })
  const data = await response.json();

  document.querySelector("#modele").innerHTML= 
  `
  <datalist id="test_2" onchange="GetType()" >
   ${

    data.map(e=>`<option>${e.model}</option>`)
   }
   </datalist>
  `
}


async function GetType() {
  const response=await fetch(`${api}types`, {
    "method": "GET",
    "headers": {
      "x-rapidapi-key": "416dbc74a5msh217b890f50d377ap173f0bjsn35c0e3cc0937",
      "x-rapidapi-host": "car-data.p.rapidapi.com"
    }

  })
  const data = await response.json();

  document.querySelector("#type").innerHTML= 
  `
  <datalist id="test_3" onchange="GetYear()" >
   ${

    data.map(data=>`<option>${data}</option>`)
   }
   </datalist>
  `
}

async function GetYear() {
  const response=await fetch(`${api}years`, {
    "method": "GET",
    "headers": {
      "x-rapidapi-key": "416dbc74a5msh217b890f50d377ap173f0bjsn35c0e3cc0937",
      "x-rapidapi-host": "car-data.p.rapidapi.com"
    }

  })
  const data = await response.json();

  document.querySelector("#year").innerHTML= 
  `
  <datalist id="test_4" >
   ${

    data.map(data=>`<option>${data}</option>`)
   }
   </datalist>
  `
}



getData()
        function initialize() {
          var input = document.getElementById('searchTextField');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
          document.getElementById('ville').value = place.name;
            
                
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        function initialize() {

var options = {
 types: ['(cities)'],
 componentRestrictions: {country: "mar"}
};

var input = document.getElementById('searchTextField');
var autocomplete = new google.maps.places.Autocomplete(input, options);
}
    </script>
<style>
  .uk-inline-container {
    display: block;
}
#marev{  
  transition: opacity 2s linear;  
  transform:translate(0);
  opacity: 1;
}  
.hidden {  
  transform:translate(9999px);
  opacity: 0;  
}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (Session::has('pdf_send'))
 <script>
     swal("SEND","{!! Session::get('success') !!}","success",{
    button:"ok",})
 </script> 
@endif


    <div class="ftco-blocks-cover-1 ">
      <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')" >
        <br>
        <div class="container">
          <div class="row align-items-center" style="width: 200%">
            <div class="col-md-6" id="marev">

                <form action="{{url('ma_voiture')}}" method="GET">
                  @csrf
            

                  {{ csrf_field() }}
                  {{-- <input type="hidden" name="_method" value="PUT">		 --}}
   
         
              <div class="feature-car-rent-box-1">
                <h3 style="text-align: center">Choisissez votre voiture</h3>
                <ul class="list-unstyled">
                  <div class="form-row">

                  <li class="form-group col-md-6">
                    <label for="ville">Ville</label><br>
    <input type="hidden" id="city2" name="city2" /> 
                    <input type="text" placeholder="Ville" id="searchTextField"  name="ville" style="width: 90%" required>
                  </li>
                  <li class="form-group col-md-6">
                    <label for="cars">Marque:</label> <br>
                    <input id="marque" list ="test" name="marque" onchange="GetModel(this.value)" style="width: 90%" required class="form-select" >
                 
                  </li>
                  </div>

                  <div class="form-row">
                    <li class="form-group col-md-6">
                      <label for="modele">Modele </label>
                      <input type="text" onchange="GetType()" list ="test_2" placeholder="modele" name="modele" class="form-select"  id="modele" style="width: 90%" required>
                                    

                    </li>
                  <li class="form-group col-md-3">
                    <label for="portes">Nombre de portes </label>
                    <input type="number" placeholder="nombre de portes" name="portes" min="3" max="6" style="width: 90%" required>
                  
                  </li>
                  <li class="form-group col-md-3">
                    <span>
                      <label for=""> </label><br>
                        <select class="form-select" name="transmission"  style="width: 90%">
                         
                        <option selected>Transmission</option>
                        <option value="automatique">automatique</option>
                        <option value="manuel">manuel</option>
                    </select>

                    </span>
                    
                  </li>
                </div>
                  <br>
                  <div class="form-row">

                  <li class="form-group col-md-6">
                    <span>
                    <label for="D_debut">Date debut </label>
                   <input type="date" placeholder="Date debut" name="D_debut" id="D_debut" style="width: 90%">
              
                   @if (count($errors->get('D_debut')))
    

                   <span style="color: red">
                           <ul>
                       @foreach ($errors->get('D_debut') as $message)
                           
                       <li> {{$message}}</li>
                              
                       @endforeach
                           </ul>
                       </span>
                   @endif 
                  </span>
                  </li> 
                  <li style="width: 50%;float: left;">
                    <span>
                    <label for="D_fin">Date fin </label><br>
                    <input type="date" name="D_fin" id="D_fin" style="width: 90%" placeholder="Date fin"> 
                    
                    @if (count($errors->get('D_fin')))
    

                    <span style="color: red">
                            <ul>
                        @foreach ($errors->get('D_fin') as $message)
                            
                        <li> {{$message}}</li>
                               
                        @endforeach
                            </ul>
                        </span>
                    @endif
                  </span>
                  </li> 
                </div>
                <script>
                    oninput="this.parentNode.querySelector(".uk-form-icon").innerText = this.value";

                </script>
                <div class="form-row">
                
       
                        
                        <li class="form-group col-md-6">
                        <div class="uk-form-controls">
                            <div class="uk-inline-container"> <!-- Add -->
                              <span>Prix min (DH) =  </span>
                              <input type="text" class="uk-form-icon uk-form-icon-flip" value="400" style="border: solid white" disabled>
                                <input type="range"
                                style="width: 70%"

                                       id="fieldable_form_discount_type_percentage_percentage_amount"
                                       name="prix_min"
                                       min="0" max="10000" step="1"
                                       class="uk-range uk-input"
                                       
                                       oninput="this.parentNode.querySelector('.uk-form-icon').value = this.value">
                            </div>
                            @if (count($errors->get('prix_min')))
    

                            <span style="color: red">
                                    <ul>
                                @foreach ($errors->get('prix_min') as $message)
                                    
                                <li> {{$message}}</li>
                                       
                                @endforeach
                                    </ul>
                                </span>
                            @endif
                        </div>
                        </li>
                        <li class="form-group col-md-6">
                        <div class="uk-form-controls">
                            <div class="uk-inline-container"> <!-- Add -->
                              <span>Prix max (DH/jour) =  </span>
                              <input type="text"  value="500" class="uk-form-icon uk-form-icon-flip" style="border: solid white" disabled>
                                <input type="range" 
                                style="width: 70%"
                                       id="fieldable_form_discount_type_percentage_percentage_amount"
                                       name="prix_max"
                                       min="0" max="10000" step="1"
                                       class="uk-range uk-input"
                                   
                                       oninput="this.parentNode.querySelector('.uk-form-icon').value = this.value">
                            </div>
                            @if (count($errors->get('prix_max')))
    

                            <span style="color: red">
                                    <ul>
                                @foreach ($errors->get('prix_max') as $message)
                                    
                                <li> {{$message}}</li>
                                       
                                @endforeach
                                    </ul>
                                </span>
                            @endif
                        </div>
                        </li></div>
                        <div  style="text-align: center">
                 
                          <input type="submit" class="ml-auto btn btn-primary" value="Cercher">
                        </div>
                    
                
                </div>
                  </div>
                 
                  </li>
                </div>
                </ul>
               
                     
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h3>Nos offres</h3>
            <p class="mb-4">Découvrez nos top voitures </p>
            <p>
              <a href="#" class="btn btn-primary custom-prev">Previous</a>
              <span class="mx-2">/</span>
              <a href="#" class="btn btn-primary custom-next">Next</a>
            </p>
          </div>


          <div class="col-lg-9">

            @if (!session()->exists('ch'))
    


            <div class="nonloop-block-13 owl-carousel">
              @foreach ($Voitures as $voiture)
            
          <div class="item-1">
              <a href="{{url('infoV/'.$voiture->num_immatriculation)}}" ><img style="height: 250px"  src="{{asset('imagess/'.$voiture->url)}}" alt="Image" class="img-fluid"></a>
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
                    <span>modele </span>
                    <span class="spec">{{$voiture->modele}}</span>
                  </li>
                  <li>
                    <span>Annee</span>
                    <span class="spec">{{$voiture->annee}}</span>
                  </li>
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
      
        @endforeach 
           </div>



            </div>
            
        @endif  
          </div>
        </div>
      </div>
  

    <div class="site-section section-3" style="background-image: url('images/hero_2.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h2 class="text-white">Nos services</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
              <div class="service-1-contents">
                <h3>Location</h3>
                <p>Nous offrons une variété de voitures à louer à bon prix !</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
              <div class="service-1-contents">
                <h3>Offres diverses</h3>
                <p>Divers marques, Divers versions et Divers catégories de voitures !  </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
              <div class="service-1-contents">
                <h3>Paiement en ligne</h3>
                <p>Possibilité d'effectuer un paiement en ligne : Sécurisé et rapide ! </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container site-section mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>How it works</h2>
          <p>Avec des simples clicks et en quelques secondes vous pouvez louer la voiture que vous aimez ! </p>
        </div>
      </div>
      <div class="how-it-works d-flex">
        <div class="step">
          <span class="number"><span>01</span></span>
          <span class="caption">Time &amp; Place</span>
        </div>
        <div class="step">
          <span class="number"><span>02</span></span>
          <span class="caption">Car</span>
        </div>
        <div class="step">
          <span class="number"><span>03</span></span>
          <span class="caption">Details</span>
        </div>
        <div class="step">
          <span class="number"><span>04</span></span>
          <span class="caption">Checkout</span>
        </div>
        <div class="step">
          <span class="number"><span>05</span></span>
          <span class="caption">Done</span>
        </div>

      </div>
    </div>
    
    
   


    <div class="site-section bg-white">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-7 text-center mb-5">
            <h2>Our Blog</h2>
            
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="{{ url('blog1') }}">
                <img src="images/post_1.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="{{ url('blog1') }}">Les informations que vous devez savoir sur une voiture</a></h2>
                <span class="meta d-inline-block mb-3">July 05, 2021 </span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="{{ url('blog2') }}">
                <img src="images/img_2.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="{{ url('blog2') }}">Ce que vous devez faire en cas d'accident</a></h2>
                <span class="meta d-inline-block mb-3">July 06, 2021 
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="{{ url('blog3') }}">
                <img src="images/img_3.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="{{ url('blog3') }}">Découverez les nouveautés des voitures </a></h2>
                <span class="meta d-inline-block mb-3">July 06, 2021 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    @include('layout.footer')

    </div>

    @endsection

  