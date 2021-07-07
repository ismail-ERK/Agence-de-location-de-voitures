@extends('layouts.app3')
@section('title')
    Profile de l'administrateur
    
@endsection

@section('content')

 <div id="content" >
<div class="news">
   
        <form class="trip-form" enctype="multipart/form-data" action="{{url('/update_profil')}}" method="POST" >
            {{csrf_field()}}
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        
                        <div class="user-avatar">
                            <img src='{{asset('imagess/'.Auth::user()->imageUs)}}' alt="Maxwell Admin">
                        </div>
                        <h5 class="user-name">{{ Auth::user()->name }}
                        </h5>
                        <h6 class="user-email">{{ Auth::user()->email }}</h6>
                    
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
                            <label for="fullName">Name Complet</label>
                            <input type="text" class="form-control" id="fullName" name="name" value="{{ Auth::user()->name }}" placeholder="Enter full name">
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter full name">
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="tel">Numero téléphone</label>
                            <input type="text" class="form-control" name="phone" id="phone" name="tel" value="{{ Auth::user()->tel }}" placeholder="Enter full name">
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="CIN">CIN</label>
                            <input type="text" class="form-control" id="CIN" name="CIN" value="{{ Auth::user()->CIN }}" placeholder="Enter full name">
                        </div>
                    </div>



                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Permit">Permit</label>
                            <input type="text" class="form-control" id="permit"  name="Permit" value="{{ Auth::user()->Permit }}" placeholder="Enter email ID">
                        </div>
                    </div>                </div>
                    
                <div class="row gutters">
                
                </div>
            </div>
            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
        </div>
        </div>
        </div>
    </form>
    <form class="trip-form" enctype="multipart/form-data" action="{{url('/update_pic_profil')}}" method="POST" >
        {{csrf_field()}}

    <div class="form-group col-md-3">
        <label for="cf-2">Image</label>
        <input style="border-style: solid" type="file"  name="file" id="cf-2" placeholder="Ville" class="form-control" >
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="text-right">
            <a href="{{URL::to('/ProfilAdmin')}}" class="btn btn-secondary"> <span>Annuler</a>
                <input type="submit" value="Ajouter l'image" class="btn btn-primary" >
            </div>
    </div>
    </form>
    </div>  
</div> 
@endsection

{{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone"value="{{ Auth::user()->name }}" placeholder="Enter phone number">
                        </div>
                    </div> --}}
                    {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="website">Website URL</label>
                            <input type="url" class="form-control" id="website" placeholder="Website url">
                        </div>
                    </div> --}}

                {{-- <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">Address</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Street">Street</label>
                            <input type="name" class="form-control" id="Street"  value="" placeholder="Enter Street">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ciTy">City</label>
                            <input type="name" class="form-control" id="ciTy" value=""  placeholder="Enter City">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="sTate">State</label>
                            <input type="text" class="form-control" id="sTate" value=""  placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="zIp">Zip Code</label>
                            <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
                        </div>
                    </div>
                </div> --}}