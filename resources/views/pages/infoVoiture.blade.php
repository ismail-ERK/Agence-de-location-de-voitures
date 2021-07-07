@extends('layout.navbar')
@section('titre')
    info voiture
@endsection
@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<div class="ftco-blocks-cover-1">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <style>
    @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);
      fieldset,
  .rating {
      border: none;
      margin-right: 30%
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
  
  
    .img-container {
      float: left;
      width: 33.33%;
      padding: 5px;
    }
    
    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
    
.mySlides1 {
height: 500px;
width: 100%;
}
img {vertical-align: auto;
height: 100%;
width: 100%;}

/* Slideshow container */
.slideshow-container {
width: 50%;
width: 50%;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  color: white;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a grey background color */
.prev:hover, .next:hover {

  background-color: #f1f1f1;
  color: white;
}

    </style>
  <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{asset('images/hero_2.jpg')}}')">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          
        
          </div>
        </div>
      </div>
    </div>
  </div>



<br><br><h3>Exterieur :</h3>

  <div class="slideshow-container background">
    @foreach ($images as $image)
  
      <div class="mySlides1">
        <img src="{{asset('imagess/'.$image->url)}}"  style="width:100%">
      </div>
    
   @endforeach  
      <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
      <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
    </div>
    
   

   
    
    </div>
    <br>
    
    <script>
var slideIndex = [1,1];
var slideId = ["mySlides1", "mySlides2"]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}
    </script>
    






  <div class="col-md-12">

  

    <div class="container">

      

        

   <h3>Interieur :</h3>
<iframe src="{{$image360->url}}"  allowfullscreen="true" frameborder="0" style="height: 500px;width: 100%;"></iframe>






	


{{-- <img src="{{asset('imagess/'.$image->url)}}" alt=""  class="img-fluid" style="height: 40%;width: 50%;"> --}}




<div class="card">

<div class="card-body" style="padding: 5%">
  <blockquote class="blockquote mb-0">
    <p>Marque :  {{$voiture->marque}}</p>
    <p>Modele :  {{$voiture->modele}}</p>
    <p>Annee :  {{$voiture->annee}}</p>
    <p>Nombre de places :  {{$voiture->nombre_places}}</p>
    <p>Nombre de portes :  {{$voiture->nombre_portes}}</p>
    <p>Transmission :  {{$voiture->transmission}}</p>
    <p>Categorie :  {{$voiture->categorie}}</p>
    <p>Prix par jour :  {{$voiture->prix_jour}}</p>
    <p>Nom agence :  {{$agence->nom}}</p>
    <p>Ville  :  {{$agence->ville}}</p>
  </blockquote>
  <a href="{{ url('louer/'.$voiture->num_immatriculation)}}" class="btn btn-primary" style="float: right">Rent-now</a>
</div>
</div>
<br><br><br><br><br>
<div class="container">

  <div class="row align-items-center justify-content-center">
    
  
   
<script>
  $(document).ready(function(){

$("input[type='radio']").click(function(){
var sim = $("input[type='radio']:checked").val();
//alert(sim);
if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } }); });

</script>

      <form class="trip-form col-md-6"  action="{{url('/rate_voiture')}}" method="POST" >
         {{csrf_field()}}
         <center>
         <span class="myratings">{{$voiture->value}}</span>
         <div class="form-group col-md-3" style="display: none">
          <label for="cf-1">Numero d'immatriculation</label>
          <input type="text"  value="{{$voiture->num_immatriculation}}"name="num_immatriculation" id="cf-1" placeholder="XXXXXXX" class="form-control" readonly>
        </div>
         <fieldset class="rating"> 
             <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
             <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
             <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> 
             <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> 
             <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> 
             <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> 
             <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
             <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> 
             <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
             <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
          </fieldset>
          <div class="form-group col-md-3">   
            <div class="col-lg-12">
              <input type="submit" value="Rate" class="btn btn-primary">
            </div>
          </div>
        </center>
        </form>

      </div>
    </div>
  </div>

</div>
</div>
<br><br>
  @include('layout.footer')


  </div>


@endsection