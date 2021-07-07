@extends('layout.navbar')
@section('titre')
    Voiture recherchée
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{ asset('images/hero_2.jpg') }}')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 text-center" style="padding: 10%">
            <h1>Voici les voitures que vous recherchez</h1>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="col-lg-9">

   
  
  
  <div class="site-section">
    <div class="container">
      <div class="row">
      @foreach ($cars as $car)
    
  
      
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="item-1">
            <a href="{{url('infoV/'.$car->num_immatriculation)}}" >
              <img style="height: 250px" src={{asset("imagess/".$car->url)}} alt="Image" class="img-fluid">
            </a>
            <div class="item-1-contents">
              <div class="text-center">
        <h3><a href="{{url('infoV/'.$car->num_immatriculation)}}">{{$car->marque}}</a></h3>
        <div class="rating">
          @for ($i = 0; $i < ceil($car->value); $i++)
          <span class="icon-star text-warning"></span>
@endfor
@for ($j = $car->value +1  ; $j <= 5; $j++)
<span class="icon-star text-muted"></span>
@endfor
        </div>
        <div class="rent-price"><span>{{$car->prix_jour}}/</span>day</div>
        </div>
        <ul class="specs">
          <li>
            <span>modele </span>
            <span class="spec">{{$car->modele}}</span>
          </li>
          <li>
            <span>Annee</span>
            <span class="spec">{{$car->annee}}</span>
          </li>
          <li>
            <span>Seats</span>
            <span class="spec">{{$car->nombre_places}}</span>
          </li>
          <li>
            <span>Transmission</span>
            <span class="spec">{{$car->transmission}}</span>
          </li>
          <li>
            <span>nombre de portes</span>
            <span class="spec">{{$car->nombre_portes}}</span>
          </li>
        </ul>
        <div class="d-flex action">
          <a href="{{ url('louer/'.$car->num_immatriculation)}}" class="btn btn-primary">Rent Now</a>
        </div>
      </div>
    </div>
</div>
  
  
  @endforeach 
</div>   </div>


</div>
   </div>
  
  
  
  
      

  
  
  
  


          </div>
        </div>
      </div>
    </div>
  </div>


         
      </div>
    </div>
  </div>
  

  @include('layout.footer')



@endsection 