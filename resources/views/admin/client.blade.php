@extends('layouts.app3')
@section('title')
    Clients
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
  use App\Http\Controllers\ClientController;
  ?>

 <div id="content" >
  <div class="news">
  


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                          <h2>Nos <b>Client</b></h2>
                      </div>
                     
                  </div>
              </div>
              
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                        <th>Avatar</th>
                        <th><th>
                          <th>Nom</th>
                          <th>Cin</th>	
                          <th>Email</th>	
                          <th>Telephone</th>
                          <th>Permit</th>					
                          <th>Nombre de Locations</th>
                         
                          <th>modifie depuis</th>
                          <th>Voir</th>
                          <th>Supprimer</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($clients as $client)
                    <tr>
                      <td>
                        <span class="avatar avatar-online">
                          <img style="max-height: 50px" src='{{asset('imagess/'.$client->imageUs)}}' alt="">
                          <i></i>
                        </span>
                      <td>
                     <td></td>

                        <td>{{$client->name}}</td>
                        <td>{{$client->CIN}}</td>
                        <td>{{$client->email}}</td>  
                        <td>{{$client->tel}}</td>  
                        <td>{{$client->Permit}}</td>  
                        <td>{{ClientController::getNombreLocations($client->id)}}</td>
                    
                        <td>{{\Carbon\Carbon::parse($client->updated_at)->diffForHumans()}}</td>
                        {{-- <a  class="delete" title="Voir Info Agence" data-toggle="tooltip"><i class="material-icons">visibility</i></a> --}}
                      <td>
                    
                        <a href="ProfilClient/{{$client->id}}"class="eyes" title="afficher client" data-toggle="tooltip"><span class="material-icons">
                            remove_red_eye  </span></td>
                        <td>
                                           
                         <a  href="DeleteClient/{{$client->id}}" class="delete" title="Supprimer Client" data-toggle="tooltip"><i class="material-icons">delete</i></a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
              <div class="clearfix">
                <ul class="pagination">
               
                      <li>{{$clients->links() }}</li>
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