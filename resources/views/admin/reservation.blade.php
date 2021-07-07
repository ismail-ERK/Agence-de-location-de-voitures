@extends('layouts.app3')
@section('title')
    Locations
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

@if (Session::has('delete'))

 <script>
     swal("Suppression","{!! Session::get('success') !!}","delete",{
    button:"ok",})
 
    </script> 

  {{Session::put('delete',null)}}

  @endif



  <?php
  use App\Http\Controllers\ReservationController;
  ?>

<div id="content" >
  <div class="news">




<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                          <h2>Nos <b>locations</b></h2>
                      </div>
                     
                  </div>
              </div>
              
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                        <th>Avatar</th>
                        <th><th>
                          <th>nom du client</th>
                          <th>num_immatriculation</th>	
                          <th>voiture</th>
                          <th>Image  </th>	
                          <th>dateDL</th>	
                          <th>DateFL</th>
                          
                         
                          <th>modifie depuis</th>
                          <th>Voir</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>
                           <?php
                           $user=ReservationController::getReservationClient($location->id_user);
                           $voiture=ReservationController::getReservationCar($location->num_immatriculation);
                           $img=ReservationController::getReservationCarImg($location->num_immatriculation);

                           ?>
                        <span class="avatar avatar-online">
                          <img src='{{asset('imagess/'.$user->imageUs)}}' alt="">
                          <i></i>
                        </span>
                      <td>
                     <td></td>
                        <td>{{$user->name}}</td>
                        <td>{{$location->num_immatriculation}}</td>
                        <td>{{$voiture->marque}}</td>
                        
                        <td><span class="avatar avatar-online">
                            <img src='{{asset('imagess/'.$img->url)}}' alt="">
                            <i></i>
                          </span></td>
                        <td>{{$location->dateDL}}</td>  
                        <td>{{$location->dateFL}}</td>  
                        {{-- <a  class="delete" title="Voir Info Agence" data-toggle="tooltip"><i class="material-icons">visibility</i></a> --}}
                                              <td>{{\Carbon\Carbon::parse($location->updated_at)->diffForHumans()}}</td>

                        <td>
                    
                        <a  href="{{URL::to('/showReservation/'.$location->id_location)}}" lass="eyes" title="afficher client" data-toggle="tooltip"><span class="material-icons">
                            remove_red_eye  </span></td>
                      
                    </tr>
                    @endforeach
                  </tbody>
              </table>
              <div class="clearfix">
                <ul class="pagination">
               
                      <li>{{$locations->links() }}</li>
                    {{-- <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li> --}}
                  </ul>
              </div>
            </div>
            
        </div>
        <div class="container-xl"></div>
        <div class="container-xl"></div>
    </div>     
</div>
 
   
  @endsection