<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>info sur la reservation</title>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
         .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
.navbar-brand{
  font-size: 200%;
}
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('back')}}">Home</a>
  
  </div>
</nav>  <div class="card" style="width: 35%;">
    <img
      src='{{asset('imagess/'.$image->url)}}'
     
      class="card-img-top"
    />
    <div class="card-body">
      <div class="card-text">
      <div class="form-row">
        <div class="col">
          <label for="marque">Date debut de location </label>
          <input type="text"  name="DD" class="form-control " value="{{$vars->dateDL}}" disabled>
        </div>
        <div class="col">
          <label for="marque">Date fin de location</label><br>
          <input type="text"  name="DF" class="form-control col" value="{{$vars->dateFL}}" disabled>
        </div>
      </div>

      <div class="form-row">
        <div class="col">
          <label for="marque">Marque</label>

          <input type="text"  name="marque" class="form-control " value="{{$vars->marque}}" disabled>
        </div>
        <div class="col">
          <label for="marque">modele</label>

          <input type="text" name="medele" class="form-control " value="{{$vars->modele}}" disabled>
        </div>
      </div>



      <div class="form-row">
        <div class="col">
          <label for="annee">Annee</label>
          <input type="text" name="annee" class="form-control " value="{{$vars->annee}}" disabled>
        </div>
        <div class="col">
          <label for="marque">Transmission</label>
          <input type="text" name="transmission" class="form-control " value="{{$vars->transmission}}" disabled>
        </div>
      </div>

      <div class="form-row">
        <div class="col">
          <label for="couleur">Couleur</label>
          <input type="text" name="couleur" class="form-control " value="{{$vars->couleur}}" disabled>
        </div>
        <div class="col">
          <label for="ville">Agence</label>
          <input type="text" name="ville" class="form-control " value="{{$vars->ville}}" disabled>
        </div>
      </div>


 

</div>

    </div>
  
                </div>
</body>
</html>