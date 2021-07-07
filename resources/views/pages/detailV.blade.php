@extends('layout.navbar')
@section('titre')
    Detail voiture
@endsection
@section('content')
    




    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 overlay innerpage" style="background-image: url('images/hero_2.jpg')">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
               <img src="{{$voiture->image}}">
               <h3>Marque : {{$voiture->marque}}</h3>
               <h3>Models : {{$voiture->modele}}</h3>
               <h3>Categorie : {{$voiture->marque}}</h3>
               <h3>Couleur : {{$voiture->marque}}</h3>
               <h3>Transmission : {{$voiture->transmission}}</h3>
               <h3>Nombre de location : {{$voiture->nombre_location}}</h3>
               <h3>Disponibilite : {{$voiture->disponible}}</h3>
               <h3>Pris par heure  : {{$voiture->prix_heure}}</h3>
               <h3>Agence  : {{$voiture->nom_agence}}</h3>

              </div>
            </div>
          </div>
        </div>
      </div>
  
      
  
  
      @include('layout.footer')

  
      </div>
  

      @endsection