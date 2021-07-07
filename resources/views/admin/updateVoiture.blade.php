@extends('layouts.app3')
@section('title')
    info agence
@endsection

  @section('content')
  <script>
    const api="https://car-data.p.rapidapi.com/cars/"
    const api2 ="https://car-data.p.rapidapi.com/cars?limit=50&page=0&make="
   
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
    
      document.querySelector("#make").innerHTML= 
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
    
      document.querySelector("#model").innerHTML= 
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
      <datalist id="test_4" onchange="GetYear()" >
       ${
    
        data.map(data=>`<option>${data}</option>`)
       }
       </datalist>
      `
    }
    
    
    
    getData()
     
    
    
    </script>
    
  <style>
  
    fieldset,
    .rating {
        border: none;
        margin-right: 49px
    }
    
    .myratings {
        font-size: 85px;
        color: green
    }
    
    .rating>[id^="star"] {
        display: none
    }
    
    .rating>label:before {
        margin: 5px;
        font-size: 2.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005"
    }
    
    .rating>.half:before {
        content: "\f089";
        position: absolute
    }
    
    .rating>label {
        color: #ddd;
        float: right
    }
    
    .rating>[id^="star"]:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #FFD700
    }
    
    .rating>[id^="star"]:checked+label:hover,
    .rating>[id^="star"]:checked~label:hover,
    .rating>label:hover~[id^="star"]:checked~label,
    .rating>[id^="star"]:checked~label:hover~label {
        color: #FFED85
    }
    
    
        </style>
  <script>
      $(document).ready(function(){
  
  $("input[type='radio']").click(function(){
  var sim = $("input[type='radio']:checked").val();
  //alert(sim);
  if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } }); });
  
  </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (Session::has('success'))

 <script>
     swal("AJOUT","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 
  {{Session::put('success',null)}}

  @endif
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (Session::has('deleteImg'))

 <script>
     swal("Suppression","{!! Session::get('deleteImg') !!}","deleteImg",{
    button:"ok",})
 
    </script> 
  {{Session::put('deleteImg',null)}}

  @endif
  <div id="content" >
  <div class="news">
    <div class="container">
 @foreach ($voitures as $voiture)
 <div class="row align-items-center">
  <div class="col-lg-12">
  <form class="trip-form" action="{{url('/save_voiture_update')}}" method="POST" >
      {{csrf_field()}}
           
          <div class="row align-items-center mb-9">
            <div class="col-md-4">
              <h3 class="m-11"></h3>
            </div>
            <div class="col-md-4 text-md-center">
              <span class="text-primary"></span> <span><h3 class="m-11">la voiture {{$voiture->marque }} {{$voiture->modele }} </h3></span></span>
            </div>
            
          </div>
          <div class="row" >
        <div class="form-group col-md-3">
                  <label for="cf-1">Numero d'immatriculation</label>
                  <input type="text"  value="{{$voiture->num_immatriculation}}"name="num_immatriculation" id="cf-1" placeholder="XXXXXXX" class="form-control" readonly>
                </div>
           
            <div class="form-group col-md-3">
              <label for="cf-2">Marque</label>
              <input  list ="test" id="make" onchange="GetModel(this.value)"  style="border-style: solid"type="text" name="marque" id="cf-2" value="{{$voiture->marque}}"  class="form-control" required>
            </div>
            <div class="form-group col-md-3">
              <label for="cf-3">Modele</label>
              <input style="border-style: solid" list ="test_2" id="model" onchange="GetYear()" type="text" name="modele" id="cf-3"  value="{{$voiture->modele}}"  class="form-control"required>
            </div>
            <div class="form-group col-md-3">
              <label for="cf-3">Annee</label>
              <input style="border-style: solid" list ="test_4" id="year"  type="text" name="annee" id="cf-3" value="{{$voiture->annee}}" placeholder="Annee" class="form-control"required>
            </div>
            <div class="form-group col-md-3">
              <label for="cf-4">couleur</label>
              <input style="border-style: solid" type="text" name="couleur" id="cf-4" value="{{$voiture->couleur}}"   class="form-control"required>
            </div>
            <div class="form-group col-md-3">
                <label for="cf-4">Transmission</label>
                <input  style="border-style: solid"type="text" name="transmission" id="cf-4" value="{{$voiture->transmission}}"  class="form-control"required>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">Nombre de place</label>
                <input style="border-style: solid" type="number" name="nombre_places" id="cf-4"  value="{{$voiture->nombre_places}}" class="form-control"required>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">Nombre de portes</label>
                <input style="border-style: solid"type="number" name="nombre_portes" id="cf-4" value="{{$voiture->nombre_portes}}"  class="form-control"required>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">prix_jour</label>
                <input style="border-style: solid"type="number" name="prix_jour" value="{{$voiture->prix_jour}}"  id="cf-4" class="form-control"required>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">nombre de locations</label>
                <input style="border-style: solid"type="number" name="nombre_location" value="{{$voiture->nombre_location}}"  id="cf-4" class="form-control" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="cf-4">disponibilité</label>
                @if ($voiture->disponible==0)
                <input style="border-style: solid"type="text" name="disponible" value="Non"  id="cf-4" class="form-control"readonly>
                @else
                
                <input style="border-style: solid"type="text" name="disponible" value="Oui" id="cf-4" class="form-control"readonly>
                
                @endif
              </div>
            
              <div class="form-group col-md-3">
                <label for="cf-4">Categorie</label>
                <select name="cat" class="form-control">
                  @foreach($categories as $categorie)
                  <option  value="{{$categorie-> nom}}">{{ $categorie->nom}}</option>
              @endforeach
            
                </select>
          </div>
              <div class="form-group col-md-3">
                <label for="cf-4">Agence</label>
               
                <select name="ag" class="form-control">
                  @foreach($agences as $agence)
                  <option  value="{{$agence->	id_agence}}">{{ $agence->	nom }}</option>
              @endforeach
                </select>
                </div>
                
            <div class="form-group col-md-3">   
              <div class="col-lg-6">
                <input type="submit" value="Modifier" class="btn btn-primary">
              </div>
            </div>
             
           
            
            <div class="row gutters" >
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">
                    <a href="{{URL::to('/voiture')}}" class="btn btn-secondary"> <span>Annuler</a>
                  </div>
              </div>
          </div>
          
          </form>
         
        </div>
      <br>
    
      <br><br>
      
        <div class="text-left" >
           <button type="button" onclick="asd(1)" id="submit" name="submit" class="btn btn-primary">ajouter une image Normale </button>
           <button type="button" onclick="asb(1)" id="submit" name="submit" class="btn btn-primary">ajouter une image 360 </button>

         </div>
         <div class="text-right">
       
        </div>
 
        <div class="text-center">
          <form   id="asb" class="trip-form"  enctype="multipart/form-data"action="{{url('/save_img_voiture_360')}}" method="POST" >
            {{csrf_field()}}
    
       <div class="form-group col-md-3">
         <br><br>
          <label for="cf-2">Image 360</label>
          <input type="text" name="img" id="cf-2" placeholder="URL image 360" class="form-control" required>
        </div>
        <div class="form-group col-md-3" style="display:none">
         <label for="cf-1">Numero d'immatriculation</label>
         <input type="text"  value="{{$voiture->num_immatriculation}}"name="num_immatriculation" id="cf-1" placeholder="XXXXXXX" class="form-control" readonly>
       </div>
    <div class="form-group col-md-3" style="display: inline">
      <input type="submit" value="Ajouter l'image" class="btn btn-primary" >
      <button type="button" onclick="asd(0)"id="submit" name="submit" class="btn btn-secondary">Annuler</button>

    </div>
    
      </form>
       
       </div>
         <div class="text-center">
           <form   id="asd" class="trip-form"  enctype="multipart/form-data"action="{{url('/save_img_voiture')}}" method="POST" >
             {{csrf_field()}}
     
        <div class="form-group col-md-3">
          <br><br>

           <label for="cf-2">Image normale</label>
           <input type="file" name="file" id="cf-2" placeholder="file" class="form-control" required>
         </div>
         <div class="form-group col-md-3" style="display:none">
          <label for="cf-1">Numero d'immatriculation</label>
          <input type="text"  value="{{$voiture->num_immatriculation}}"name="num_immatriculation" id="cf-1" placeholder="XXXXXXX" class="form-control" readonly>
        </div>
     <div class="form-group col-md-3" style="display: inline">
       <input type="submit" value="Ajouter l'image" class="btn btn-primary" >
       <button type="button" onclick="asb(0)"id="submit" name="submit" class="btn btn-secondary">Annuler</button>

     </div>
     
       </form>
        
        </div>
   
   <script type="text/javascript">
   
     window.onload = function() {
   
       document.getElementById("asd").style.display = "none";
       document.getElementById("asb").style.display = "none";

     };
   
     function asd(a) {
     
       if (a == 1) {
         document.getElementById("asd").style.display = "block";
         document.getElementById("asb").style.display = "none";

       } else {
         document.getElementById("asd").style.display = "none";
       }
         
     }
     function asb(a) {
     
     if (a == 1) {
       document.getElementById("asb").style.display = "block";
       document.getElementById("asd").style.display = "none";

     } else {
       document.getElementById("asb").style.display = "none";
     }
       
   }
   </script>
   
      </div>
      <!-- Carousel wrapper -->
<div
id="carouselMultiItemExample"
class="carousel slide carousel-dark text-center"
data-mdb-ride="carousel">
<br><br><br>
<div class="carousel-inner py-4">
  <!-- Single item -->
  <div class="carousel-item active">
    <div class="container">

        <h2>les images normales</h2>
        <br><br><br>
          @if (count($images) < 0)
          <h2>pad d'images normales</h2>
          @else
        @foreach ($images as $image)
        <div class="col-lg-4">
         
          <div class="card" style="width: 18rem;">
            <img  src="{{asset('imagess/'.$image->url) }}" class="card-img-top" alt="...">
            <div class="card-body">
              
              <p class="card-text" style="font-size: 12px ">
              Ajoutée depuis
              <td>{{\Carbon\Carbon::parse($image->created_at)->diffForHumans()}}</td>

              </p>
              <a href="{{URL::to('showCar/updateVoiture/deleteImage/'.$voiture->num_immatriculation.'/'.$image->id)}}"  class="btn btn-primary">Supprimer</a>
            </div>
          </div>
        </div>
      </div>
      <br>
        @endforeach
        @endif

        <h2> les images 360</h2>
        <br><br><br>
      <div class="row">
        

      @foreach ($images360 as $image360)

       

            <iframe height="350px" width="100%" allowfullscreen="true" 
            src="{{$image360->url}}"  style="display: block"> </iframe>
            <div class="card-body">
              
              <p class="card-text" style="font-size: 12px ">
              Ajoutée depuis
              <td>{{\Carbon\Carbon::parse($image360->created_at)->diffForHumans()}}</td>

              </p>
              <a href="{{URL::to('showCar/updateVoiture/deleteImage/'.$voiture->num_immatriculation.'/'.$image360->id)}}"  class="btn btn-primary">Supprimer</a>
            </div>
      @endforeach

      
   
    </div>


              


        

        

        
     
      </div>
    </div>
  </div>

  <!-- Single item -->
 

  
</div>
<!-- Inner -->
</div>

<!-- Carousel wrapper -->
    @endforeach
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





{{-- @extends('layouts.app4')
@section('title')
    voitureme
@endsection

@section('content')

@if (Session::has('success'))
 <script>
     swal("Modification","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 
  {{Session::put('success',null)}}

  @endif
<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">
 
    <div class="container">
     
      <div class="row">
        <div class="col-12">
            @foreach ($voitures as $voiture)
          <div class="row align-items-center">
            <div class="col-lg-12">
            <form class="trip-form" action="{{url('/save_voiture_update')}}" method="POST" >
                {{csrf_field()}}
              <div class="row align-items-center mb-9">
                <div class="col-md-4">
                  <h3 class="m-11"></h3>
                </div>
                <div class="col-md-4 text-md-center">
                  <span class="text-primary"></span> <span><h3 class="m-11">Ajouter une  voiture</h3></span></span>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="cf-1">Numero d'immatriculation</label>
                  <input type="text"  value="{{$voiture->num_immatriculation}}"name="num_immatriculation" id="cf-1" placeholder="XXXXXXX" class="form-control" required>
                </div>
               
                <div class="form-group col-md-3">
                  <label for="cf-2">Marque</label>
                  <input type="text"  value="{{$voiture->marque}}" name="marque" id="cf-2" placeholder="Marque" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-3">Modele</label>
                  <input type="text"  value="{{$voiture->modele}}" name="modele" id="cf-3" placeholder="Modele" class="form-control"required>
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-4">couleur</label>
                  <input type="text"   value="{{$voiture->couleur}}" name="couleur" id="cf-4" placeholder="couleur" class="form-control"required>
                </div>
                <div class="form-group col-md-3">
                    <label for="cf-4">Transmission</label>
                    <input type="text"   value="{{$voiture->transmission}}" name="transmission" id="cf-4" placeholder="Transmission" class="form-control"required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Nombre de place</label>
                    <input type="number"   value="{{$voiture->nombre_places}}"name="nombre_places" id="cf-4" placeholder="Nombre de place" class="form-control"required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Nombre de portes</label>
                    <input type="number"   value="{{$voiture->nombre_portes}}" name="nombre_portes" id="cf-4" placeholder="Nombre de portes"class="form-control"required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">prix_jour</label>
                    <input type="number"  value="{{$voiture->prix_jour}}" name="prix_jour" id="cf-4" placeholder="prix_jour en DH"class="form-control"required>
                  </div>
                 
                  <div class="form-group col-md-3">
                    <label for="cf-4">Categorie</label>
                    <select name="cat" class="form-control">
                      @foreach($categories as $categorie)
                      <option  value="{{$categorie-> nom}}">{{ $categorie->nom}}</option>
                  @endforeach
                
                    </select>
              </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Agence</label>
                   
                    <select name="ag" class="form-control">
                      @foreach($agences as $agence)
                      <option  value="{{$agence->	id_agence}}">{{ $agence->	nom }}</option>
                  @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-3">  
                </div>
                <div class="form-group col-md-3">    
                </div>
                <div class="form-group col-md-3">   
                  <div class="col-lg-6">
                    <input type="submit" value="Ajouter" class="btn btn-primary">
                  </div>
                </div>
              </form>
           
      
          </div>
           <div>
      
   
     
    </div>
       </div>
       <div>

   
             
      <form class="trip-form" action="{{url('/rate_voiture')}}" method="POST" >
        {{csrf_field()}}
   
 <select id="type" name="type" class="form-control" onchange="changementType();">
          <option value="360">Image 360</option>
          <option value="normal">Image normal</option>
        </select>
    </form> 
    <div>
    <form class="trip-form" action="{{url('/rate_voiture')}}" method="POST" >
      {{csrf_field()}}
 

      <div class="form-group col-md-3">   
        <div class="col-lg-6">
          <input type="submit" value="Ajouter Image" class="btn btn-primary">
        </div>
      </div>
      
    
  </form>
</div>
 
  </div>
  </div>  
    @endforeach
</div>
</div>
   
  
  

@endsection
<script >

function changementType() {
var type = document.getElementById("type");
var div = document.getElementById("hebdomadaire");
if (type == "360") {
div.style="display:block";
} else {
div.style="display:none";
}
}
  </script> --}}