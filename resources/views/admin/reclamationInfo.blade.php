@extends('layouts.app3')
@section('title')
  Infor du reclamations
    
@endsection

@section('content')
<?php
use App\Http\Controllers\ReservationController;
?>
 <div id="content" >
<div class="news">
    @foreach ($reclamations as $reclamation )

        
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        
                        <div class="user-avatar">
                            <img src='{{asset('imagess/'.$reclamation->imageUs)}}' alt="Maxwell Admin">
                        </div>
                        <h5 class="user-name">
                        </h5>
                        <h6 class="user-email"></h6>
                    
                    </div>
           
                </div>
            </div>
        </div>
        </div>
                                
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Message</h6>
                    </div>
                    <div class=" col-md-6 ">
                        <div class="form-group">
                            <label for="fullName">Objet</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $reclamation->objet }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class=" col-md-6 ">
                       
                    </div>
                    <div class=" col-md-6 ">
                       <label for="fullName">Objet</label>
                    </div>
 
                    <div class=" col-md-12 " >
                        <br>
                        <div class="form-group" style="
                        border-width:2px;  
                        border-style:solid;
                        padding: 4% 4% 4% 4%;
 
                    ">
                            <h6 class="font-monospace">{{ $reclamation->data}}</h6>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $reclamation->name }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Email</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $reclamation->email }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">CIN</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $reclamation->CIN }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Telephone</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $reclamation->tel }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="fullName">Permit</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $reclamation->Permit }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class=" col-md-6  ">
                        
                    </div>
                    
            <div class="form-group col-md-3">
              <label for="cf-4">Longitude</label>
             
              <input  onload="doSomething()"  type="text" class="form-control" value="{{$reclamation->longitude}}"  id="longitude"  >
              
            </div>
            <div class="form-group col-md-3">
              <label for="cf-4">Latitude</label>
              <input onload="doSomething()"  type="text" name="adresse" id="latitude"class="form-control" value="{{$reclamation->latitude}}" >
            </div>
            
              <!--The div element for the map -->
              <div id="map" style="width :80%; height :500px"></div>
              <script async
              src="https://maps.googleapis.com/maps/api/js?v=3.44
                  &key=AIzaSyBy-vKh2q5Uw2BT6Xu4uuvz6p3Qr_DrcU4&callback=initMap">
            </script>
              <script >
                  var latitude = document.getElementById('latitude').value;
                  var longitude = document.getElementById('longitude').value;
            
                  // Initialize and add the map
            function initMap() {
            // The location of Uluru
            
            const uluru = { lat: parseFloat(latitude), lng: parseFloat(longitude) };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
              zoom: 7,
              center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
              position: uluru,
              map: map,
            });
            }
            
              </script>

                
            </div>
        </div>
        </div>
        </div>

    </form>

    @endforeach
    
        </div>
</div>
@endsection