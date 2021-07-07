@extends('layouts.app3')
@section('title')
    ajouter agence
@endsection

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (Session::has('success'))

 <script>
     swal("AJOUT","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 
  {{Session::put('success',null)}}

  @endif

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy-vKh2q5Uw2BT6Xu4uuvz6p3Qr_DrcU4&region=mar&sensor=false
    &libraries=places"></script>
    <script>
        function initialize() {
          var input = document.getElementById('searchTextField');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
          document.getElementById('city2').value = place.name;
              //  document.getElementById('cityLat').value = place.geometry.location.lat();
              //   document.getElementById('cityLng').value = place.geometry.location.lng();
                
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        function initialize() {

var options = {
 types: ['(cities)'],
 componentRestrictions: {country: "mar"}
};

var input = document.getElementById('searchTextField');
var autocomplete = new google.maps.places.Autocomplete(input, options);
}
    </script>
  <div id="content" >
<div class="news">
  <div class="container">
     
        <div class="row align-items-center">
          <div class="col-lg-12">
       
              <form class="trip-form"  enctype="multipart/form-data"action="{{url('/save_agence')}}" method="POST" >
                  {{csrf_field()}}
                <div class="row align-items-center mb-9">
                  <div class="col-md-4">
                    <h3 class="m-11"></h3>
                  </div>
                  <div class="col-md-4 text-md-center">
                    <span class="text-primary"></span> <span><h3 class="m-11">Ajouter une  agence</h3></span></span>
                  </div>
                </div>
                <div class="row">
                 
                 <div class="form-group col-md-3">
                    <label for="cf-2">nom Agence</label>
                    <input style="border-style: solid" type="text" name="nom" id="cf-2" placeholder="Nom de l'agence" class="form-control" required>
                  </div>
               
                  {{-- <div class="form-group col-md-3">
                    <label for="cf-2">Ville</label>
                    <input type="text" name="ville" id="cf-2" placeholder="Ville" class="form-control" required>
                  </div> --}}
                   <div class="form-group col-md-3">
                  </div>
                  {{-- <div class="form-group col-md-3">
                    <label for="cf-2">Ville</label>
                    <input style="border-style: solid" type="text"  id="cf-2" placeholder="Ville" class="form-control" required>
                  </div> --}}
                  <div class="form-group col-md-3">
                    <label for="cf-2">Ville</label>
                    <input id="searchTextField" type="text"  name="ville"size="50" placeholder="Enter a location" autocomplete="on" runat="server" />  
                  </div>

                  <div class="form-group col-md-3">
                  </div>
{{--                   
                  <div class="form-group col-md-3">
                    <label for="cf-2">Image</label>
                    <input style="border-style: solid" type="file" name="ville" id="cf-2" placeholder="Ville" class="form-control" required>
                  </div>
                  --}}
                  <div class="form-group col-md-3">
                    <label for="cf-4">Adresse</label>
                    <textarea style="border-style: solid"   placeholder="Adresse  de l'agence"name="adresse" id="cf-4"class="form-control"required>
                    </textarea>
                  </div>
                   
                  <div class="form-group col-md-3">
                  </div>
                  <div class="form-group col-md-3">
                  </div> <div class="form-group col-md-3">
                  </div>
  
                  
                    <div class="form-group col-md-3">
                      <input type="submit" value="Ajouter Agence" class="btn btn-primary">
                    </div>
                  
                  <div class="form-group col-md-3">   
                    <div class="form-group col-md-3">
  
                      <a href="{{url()->previous()}} "class="btn btn-primary"> <span>Annuler</a>
                    </div>
                  </div>
                
              </form>

            </div>
           
                 
        </div>
      </div>
    
    </div>
    
  </div>
 
</div>
 

@endsection