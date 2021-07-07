@extends('layouts.app3')
@section('title')
    Profil du client
    
@endsection

@section('content')
<?php
use App\Http\Controllers\ReservationController;
?>
 <div id="content" >
<div class="news">
    @foreach ($profils as $profil )

        
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        
                        <div class="user-avatar">
                            <img src='{{asset('imagess/'.$profil->imageUs)}}' alt="Maxwell Admin">
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
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $profil->name }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Email</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $profil->email }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">CIN</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $profil->CIN }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Telephone</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $profil->tel }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Permit</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $profil->Permit }}" placeholder="Enter full name">
                        </div>
                    </div>

                   
                                 
                  
                
            </div>
        </div>
        </div>
        </div>
    </form>
    

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                          <h2>Les  <b>locations de ce Client</b></h2>
                      </div>
                     
                  </div>
              </div>
              
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                        <th>
                        </th>

                          <th>num_immatriculation</th>	
                          <th>voiture</th>	
                          <th>Image</th>
                          <th>dateDL</th>	
                          <th>DateFL</th>
                          
                         
                          <th>modifie depuis</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>
                           <?php
                           $voiture=ReservationController::getReservationCar($location->num_immatriculation);
                           $img=ReservationController::getReservationCarImg($location->num_immatriculation);

                           ?>
                        
                        <td>{{$location->num_immatriculation}}</td>
                        <td>{{$voiture->marque}}</td>
                        <td><span class="avatar avatar-online">
                            <img  style="max-height: 50px" src='{{asset('imagess/'.$img->url)}}' alt="">
                            <i></i>
                          </span></td>
                        <td>{{$location->dateDL}}</td>  
                        <td>{{$location->dateFL}}</td>  
                        {{-- <a  class="delete" title="Voir Info Agence" data-toggle="tooltip"><i class="material-icons">visibility</i></a> --}}
                                              <td>{{\Carbon\Carbon::parse($location->updated_at)->diffForHumans()}}</td>

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
      @endforeach
    </div>  
</div> 
@endsection
