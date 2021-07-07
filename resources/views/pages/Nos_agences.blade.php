@extends('layout.navbar')
@section('titre')
    Nos agences
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('images/hero_2.jpg')">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 text-center">
        
            <h1>Voici nos agences</h1>

{{-- <form action="upload" method="POST" style="color: white">
    @csrf
    <input type="file" name="file"> <br><br>
    <button type="submit">upload file</button>
</form> --}}



          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="conatiner" style="margin: 5%">
    @foreach ($Agences as $Agence)
        

    <div class="card mb-3" style="width: 1000px;">
      <div class="row g-0">
        <div class="col-md-6">
          <img
            src="{{asset('imagess/'.$Agence->imageAg)}}"
            alt="..."
            class="img-fluid"
          />
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h5 class="card-title">{{$Agence->nom_agence}}</h5>
            <p class="card-text">
              Ville : {{$Agence->ville}}
            </p>
            <p class="card-text">
              Adresse : {{$Agence->adresse}}
            </p>
           
          <a  href="{{ url('detailAg/'.$Agence->id_agence)}}"> 
           <button type="button" class="btn btn-secondary">Infos</button>
           </a>

          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  @include('layout.footer')


  </div>


@endsection