@extends('layout.navbar')
@section('titre')
    Location
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<style>
label{
    color : white; 
}

</style>
@if (session('message'))
<script>
alert("Vous n'etes pas connecter veillez connecter pour louer ");
</script>
    
@endif
<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-2 overlay innerpage" style="height: 100%;background-image: url('{{ asset('images/hero_1.jpg') }}')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 text-center" style="padding: 10%">
            
          <form action="{{ url('louer1/'.$car->num_immatriculation) }}" method="GET">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Marque : </label>
      <input type="text" name="marque" class="form-control" id="inputEmail4" value="{{$car->marque}}" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Transmission</label>
      <input type="text" name="transmission" value="{{$car->transmission}}" class="form-control" id="inputPassword4"  disabled>
    </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Modele : </label>
        <input type="text" name="modele" class="form-control" id="inputEmail4" value="{{$car->modele}}" disabled>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Annee</label>
        <input type="text" name="annee" value="{{$car->annee}}" class="form-control" id="inputPassword4"  disabled>
      </div>
      </div>
  

    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress">Nombre de places </label>
    <input type="text" name="nbr_places" value="{{$car->nombre_places}}" class="form-control" id="inputAddress"  disabled >
    </div>
    <div class="form-group col-md-6">
    <label for="inputAddress2">Nombre de portes</label>
    <input type="text" name="nbr_portes" value="{{$car->nombre_portes}}" class="form-control" id="inputAddress2"  disabled>
    </div>
   </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress2">Prix par jour :</label>
    <input type="text" name="prix_jour" value="{{$car->prix_jour}} DH" class="form-control" id="inputAddress2"  disabled>
  </div>

    <div class="form-group col-md-6">
      <label for="inputCity">Nom Agence : </label>
      <input type="text" name="nom_agence" value="{{$agence->nom}}" class="form-control" id="inputCity" disabled>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">Ville Agence : </label>
      <input type="text" name="ville_agence " value="{{$agence->ville}}" class="form-control" id="inputCity" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Adresse Agence : </label>
      <input type="text" name="ville_agence " value="{{$agence->adresse}}" class="form-control" id="inputCity" disabled>
    </div>
    </div> 
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputZip">Date début de location : </label>
      <input type="date" name="date_d" class="form-control" id="inputZip" min="{{session()->get('DD')}}" max="{{session()->get('DF')}}">
       
      @if (count($errors->get('date_d')))
    

      <span style="color: red">
              <ul>
          @foreach ($errors->get('date_d') as $message)
              
          <li> {{$message}}</li>
                 
          @endforeach
              </ul>
          </span>
      @endif
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Date fin de location : </label>
      <input type="date" name="date_f" class="form-control" id="inputZip" min="{{session()->get('DD')}}" max="{{session()->get('DF')}}">
       
      @if (count($errors->get('date_f')))
    

      <span style="color: red">
              <ul>
          @foreach ($errors->get('date_f') as $message)
              
          <li> {{$message}}</li>
                 
          @endforeach
              </ul>
          </span>
      @endif
    </div>
    </div>
    <button type="submit" class="btn btn-success">Rent now !!</button>

 
      </div>

  </div>
  <br>
  <br>
 
</form>

          </div>
        </div>
      </div>
    </div>
</div>
       
</div>

</div></div>




</div>
</div>


@endsection