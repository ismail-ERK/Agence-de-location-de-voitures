@extends('layouts.app3')
@section('title')
    ajouter voiture
@endsection

@section('content')
<script src={{asset("js/app.js")}}>

  </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (Session::has('success'))

 <script>
     swal("AJOUT","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 
  {{Session::put('success',null)}}

  @endif
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
  
  

  
 
   
  <div id="content" >

    <div class="news">
      <div class="container">
     
          <div class="row align-items-center">
            <div class="col-lg-12">
            <form class="trip-form" action="{{url('/save_voiture')}}" method="POST" >
                {{csrf_field()}}
              <div class="row align-items-center mb-9">
                <div class="col-md-4">
                  <h3 class="m-11"></h3>
                </div>
                <div class="col-md-4 text-md-center">
                  <span class="text-primary"></span> <span><h3 class="m-11">Ajouter une  voiture</h3></span></span>
                </div>
                
              </div>
              <div class="row" >
                <div class="form-group col-md-3" >
                  <label for="cf-1">Numero d'immatriculation</label>
                  <input  style="border-style: solid"type="text" name="num_immatriculation" id="cf-1" placeholder="XXXXXXX" class="form-control" required>
                </div>
               
                <div class="form-group col-md-3">
                  <label for="cf-2">Marque</label>
                  <input    list ="test" id="make" onchange="GetModel(this.value)" style="border-style: solid"type="text" name="marque" id="cf-2" placeholder="Marque" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-3">Modele</label>
                  <input  list ="test_2" id="model" onchange="GetYear()"style="border-style: solid" type="text" name="modele" id="cf-3" placeholder="Modele" class="form-control"required>
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-3">Annee</label>
                  <input style="border-style: solid" list ="test_4" id="year"   type="text" name="annee" id="cf-3" placeholder="Annee" class="form-control"required>
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-4">couleur</label>
                  <input style="border-style: solid" type="text" name="couleur" id="cf-4" placeholder="couleur" class="form-control"required>
                </div>
                <div class="form-group col-md-3">
                    <label for="cf-4">Transmission</label>
                    <input  style="border-style: solid"type="text" name="transmission" id="cf-4" placeholder="Transmission" class="form-control"required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Nombre de place</label>
                    <input style="border-style: solid" type="number" name="nombre_places" id="cf-4" placeholder="Nombre de place" class="form-control"required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Nombre de portes</label>
                    <input style="border-style: solid"type="number" name="nombre_portes" id="cf-4" placeholder="Nombre de portes"class="form-control"required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">prix_jour</label>
                    <input style="border-style: solid"type="number" name="prix_jour" id="cf-4" placeholder="prix_jour en DH"class="form-control"required>
                  </div>
                 
                  <div class="form-group col-md-3">
                    <label for="cf-4">Categorie</label>
                    <select style="border-style: solid" name="cat" class="form-control">
                      @foreach($categories as $categorie)
                      <option  value="{{$categorie->nom}}">{{ $categorie->nom}}</option>
                  @endforeach
                
                    </select>
              </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Agence</label>
                   
                    <select style="border-style: solid" name="ag" class="form-control">
                      @foreach($agences as $agence)
                      <option  value="{{$agence->id_agence}}">{{$agence->nom }}</option>
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
                <div class="form-group col-md-3">   
                  <div class="col-lg-6">

                    <a href="{{url()->previous()}} " class="btn btn-primary"> <span>Annuler</a>
                  </div>
                </div>
              </form>
            </div>
         
          </div>
          <script src="scri.js" ></script>

        </div>
      </div>
    </div>
  
  </div>
  
  
  

@endsection