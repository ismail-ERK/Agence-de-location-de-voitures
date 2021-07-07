@extends('layout.navbar')
@section('titre')
    Les voitures
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{ asset('images/hero_2.jpg') }}')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 text-center" style="padding: 10%">
            <h1>Voici nos voitures</h1>
            {{ csrf_field() }}
             @foreach ($categories as $categorie)

            {{-- <a href="{{url('Nos_voitures/'.$categorie->nom)}}"><img  src="{{$categorie->image}}" height="100%" width="10%" style="border-radius: 50%;"></a> --}}
            
            <figure class="figure">
              
              <a href="Nos_voitures/{{$categorie->nom}}">
              <img src="{{$categorie->image}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."style="border-radius: 20%;">
              <figcaption class="figure-caption">{{$categorie->nom}}</figcaption>
            </a>
            </figure>


            @endforeach 

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">


      {{-- @foreach ($voitures as $voiture)
            
       
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="item-1">
              <a href="{{ url('detail')}}" ><img src="{{ asset('images/img_1.jpg') }}" alt="Image" class="img-fluid"></a>
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
                <div class="rent-price"><span>{{$voiture->prix_heure}}/</span>day</div>
                </div>
                <ul class="specs">
                  <li>
                    <span>nombre de location</span>
                    <span class="spec">{{$voiture->nombre_location}}</span>
                  </li>
                  <li>
                    <span>Seats</span>
                    <span class="spec">{{$voiture->nombre_place}}</span>
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
                  <a href="{{ url('louer')}}" class="btn btn-primary">Rent Now</a>
                </div>
              </div>
            </div>
        </div>

        @endforeach --}}
         
      </div>
    </div>
  </div>
  

  @include('layout.footer')



@endsection --}}