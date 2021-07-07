@extends('layout.navbar')
@section('titre')
    Nos voitures
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
<div class="ftco-blocks-cover-1">
  <style>
  
    
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
    </style>
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url({{ asset('images/hero_2.jpg') }})">
      <div class="container" >
        {{-- {{ asset('css/style.css') }}" --}}
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 text-center" style="padding: 10%;">
            <h1>Our For Rent Cars</h1>
            {{ csrf_field() }}
            <div class="clearfix">
              @foreach ($categories as $categorie)
              <div class="img-container">
                <div style="col-md-6; float: left;">
                <a style="color: white" href="{{ url('nos_voitures/'.$categorie->nom) }}">
                  <img  src="{{asset('imagess/'.$categorie->image)}}" height="100%" width="40%" style="border-radius: 50%;">
                  <p>{{$categorie->nom}}</p>
                </a> 
              </div>             </div>
              
            @endforeach 
            </div>
     



            
{{-- <div style="col-md-2; float: left;">
  <a style="color: white" href="{{ url('nos_voitures/'.$categorie->nom) }}">
  <img  src="{{asset('imagess/'.$categorie->image)}}" height="100%" width="10%" style="border-radius: 50%;">
  <p>{{$categorie->nom}}</p>
</a> --}}

  {{-- <a href="nos_voitures/{{$categorie->nom}}">{{$categorie->nom}}</a><img  src="{{$categorie->image}}" height="100%" width="10%" style="border-radius: 50%;"> --}}
{{-- </div> --}}
           
            

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
{{-- 
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="item-1">
              <a href="{{ url('detail/')}}" ><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <div class="item-1-contents">
                <div class="text-center">
                <h3><a href="#">Range Rover S64 Coupe</a></h3>
                <div class="rating">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <div class="rent-price"><span>$250/</span>day</div>
                </div>
                <ul class="specs">
                  <li>
                    <span>Doors</span>
                    <span class="spec">4</span>
                  </li>
                  <li>
                    <span>Seats</span>
                    <span class="spec">5</span>
                  </li>
                  <li>
                    <span>Transmission</span>
                    <span class="spec">Automatic</span>
                  </li>
                  <li>
                    <span>Minium age</span>
                    <span class="spec">18 years</span>
                  </li>
                </ul>
                <div class="d-flex action">
                  <a href="contact.html" class="btn btn-primary">Rent Now</a>
                </div>
              </div>
            </div>
        </div> --}}





@if (session()->exists('pass'))

        @foreach ($Voitures as $voiture)
            
       
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="item-1">
              <a href="{{url('infoV/'.$voiture->num_immatriculation)}}" ><img src="{{asset('imagess/'.$voiture->url)}}" alt="Image" class="img-fluid"></a>
              <div class="item-1-contents">
                <div class="text-center">
                <h3><a href="{{url('infoV/'.$voiture->num_immatriculation)}}">{{$voiture->marque}}</a></h3>
                <div class="rating">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <div class="rent-price"><span>{{$voiture->prix_jour}}/</span>day</div>
                </div>
                <ul class="specs">
                  <li>
                    <span>nombre de locations</span>
                    <span class="spec">{{$voiture->nombre_location}}</span>
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
        </div>

        @endforeach 


        @endif



      </div>   </div>


      </div>

  

  @include('layout.footer')



@endsection