@extends('layouts.app3')
@section('title')
    home
@endsection

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
@import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');

*
section{
    float:left;
    width:100%;
    background: #fff;  /* fallback for old browsers */
    padding:30px 0;
}
h1{float:left; width:100%; color:#232323; margin-bottom:30px; font-size: 14px;}
h1 span{font-family: 'Libre Baskerville', serif; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px; font-weight:700}
h1 a{color:#131313; font-weight:bold;}

/*Profile Card 1*/
.profile-card-1 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  width: 100%;
  color: #ffffff;
  text-align: center;
  height:368px;
  border:none;
}
.profile-card-1 .background {
  width:100%;
  vertical-align: top;
  opacity: 0.9;
  -webkit-filter: blur(5px);
  filter: blur(5px);
   -webkit-transform: scale(1.8);
  transform: scale(2.8);
}
.profile-card-1 .card-content {
  width: 100%;
  padding: 15px 25px;
  position: absolute;
  left: 0;
  top: 50%;
}
.profile-card-1 .profile {
  border-radius: 50%;
  position: absolute;
  bottom: 50%;
  left: 50%;
  max-width: 100px;
  opacity: 1;
  box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
  border: 2px solid rgba(255, 255, 255, 1);
  -webkit-transform: translate(-50%, 0%);
  transform: translate(-50%, 0%);
}
.profile-card-1 h2 {
  margin: 0 0 5px;
  font-weight: 600;
  font-size:25px;
}
.profile-card-1 h2 small {
  display: block;
  font-size: 15px;
  margin-top:10px;
}
.profile-card-1 i {
  display: inline-block;
    font-size: 16px;
    color: #ffffff;
    text-align: center;
    border: 1px solid #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin:0 5px;
}
.profile-card-1 .icon-block{
    float:left;
    width:100%;
    margin-top:15px;
}
.profile-card-1 .icon-block a{
    text-decoration:none;
}
.profile-card-1 i:hover {
  background-color:#fff;
  color:#2E3434;
  text-decoration:none;
}
/*Profile card 4*/
.profile-card-4 .card-img-block{
    float:left;
    width:100%;
    height:150px;
    overflow:hidden;
}
.profile-card-4 .card-body{
    position:relative;
}
.profile-card-4 .profile {
    border-radius: 50%;
    position: absolute;
    top: -62px;
    left: 50%;
    width:100px;
    border: 3px solid rgba(255, 255, 255, 1);
    margin-left: -50px;
}
.profile-card-4 .card-img-block{
    position:relative;
}
.profile-card-4 .card-img-block > .info-box{
    position:absolute;
    background:rgba(217,11,225,0.6);
    width:100%;
    height:100%;
    color:#fff;
    padding:20px;
    text-align:center;
    font-size:14px;
   -webkit-transition: 1s ease;
    transition: 1s ease;
    opacity:0;
}
.profile-card-4 .card-img-block:hover > .info-box{
    opacity:1;
    -webkit-transition: all 1s ease;
    transition: all 1s ease;
}
.profile-card-4 h5{
    font-weight:600;
    color:#d90be1;
}
.profile-card-4 .card-text{
    font-weight:300;
    font-size:15px;
}
.profile-card-4 .icon-block{
    float:left;
    width:100%;
}
.profile-card-4 .icon-block a{
    text-decoration:none;
}
.profile-card-4 i {
  display: inline-block;
    font-size: 16px;
    color: #d90be1;
    text-align: center;
    border: 1px solid #d90be1;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin:0 5px;
}
.profile-card-4 i:hover {
  background-color:#d90be1;
  color:#fff;
}

    </style>


<style type="text/css">
    body{
        background:#eee;
        margin-top:20px;
    }
    
    .panel {
      box-shadow: 0 2px 0 rgba(0,0,0,0.05);
      border-radius: 0;
      border: 0;
      margin-bottom: 24px;
    }
    
    .panel-dark.panel-colorful {
      background-color: #3b4146;
      border-color: #3b4146;
      color: #fff;
    }
    
    .panel-danger.panel-colorful {
      background-color: #f76c51;
      border-color: #f76c51;
      color: #fff;
    }
    
    .panel-primary.panel-colorful {
      background-color: #5fa2dd;
      border-color: #5fa2dd;
      color: #fff;
    }
    
    .panel-info.panel-colorful {
      background-color: #4ebcda;
      border-color: #4ebcda;
      color: #fff;
    }
    
    .panel-body {
      padding: 25px 20px;
    }
    
    .panel hr {
      border-color: rgba(0,0,0,0.1);
    }
    
    .mar-btm {
      margin-bottom: 15px;
    }
    
    h2, .h2 {
      font-size: 28px;
    }
    
    .small, small {
      font-size: 85%;
    }
    
    .text-sm {
      font-size: .9em;
    }
    
    .text-thin {
      font-weight: 300;
    }
    
    .text-semibold {
      font-weight: 600;
    }
    </style>
<div id="content" >
    <div class="news">
<!--Section: Block Content-->

        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="panel panel-dark panel-colorful">
                        <div class="panel-body text-center">
                            <p class="text-uppercase mar-btm text-sm">Voitures</p>
                            <i class="fa fa-car fa-5x"></i>
                            <hr>
                            <p class="h2 text-thin">{{$VoituresCount}}</p>
                            <small><span class="text-semibold">7%</span> Higher than yesterday</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="panel panel-danger panel-colorful">
                        <div class="panel-body text-center">
                            <p class="text-uppercase mar-btm text-sm">users</p>
                            <i class="fa fa-users fa-5x"></i>
                            <hr>
                            <p class="h2 text-thin">{{$userCount}}</p>
                            <small><span class="text-semibold"><i class="fa fa-unlock-alt fa-fw"></i> 154</span> Unapproved comments</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="panel panel-primary panel-colorful">
                        <div class="panel-body text-center">
                            <p class="text-uppercase mar-btm text-sm"> Agence</p>
                            <i class="fa fa-building fa-5x"></i>
                            <hr>
                            <p class="h2 text-thin">{{$AgenceCount}}</p>
                            <small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i> 954</span> Sales in this month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="panel panel-info panel-colorful">
                        <div class="panel-body text-center">
                            <p class="text-uppercase mar-btm text-sm">Location</p>
                            <i class="fa fa-address-book-o fa-5x"></i>
                            <hr>
                            <p class="h2 text-thin">{{$LocationCount}}</p>
                            <small><span class="text-semibold"><i class="fa fa-dollar fa-fw"></i> 22,675</span> Total Earning</small>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
                



        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<center ><h2 style="align: center"> Nos Meilleurs clients</h2></center>
<section>
    <div class="container">
    	<div class="row">
    	    @foreach ($best3users as $best3user)
                
            
    		
            <div class="col-md-4">
              <a href="ProfilClient/{{$best3user->id}}">
    		    <div class="card profile-card-1">
    		        <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background"/>
    		        <img src='{{asset('imagess/'.$best3user->imageUs)}}'' alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>{{$best3user->name}}</h2>
                    <h4> CIN: {{$best3user->CIN}}</h4>
                    <h4>Email: {{$best3user->email}}</h4>
                    <h4>Tel: {{$best3user->tel}}</h4>
                    </div>
                </div>
              </a>
              </div>
       
           
    		
    		
    		
    		<!--Profile Card 3-->
    		
    		
    		<!--Profile Card 4-->
      
    		@endforeach
      </div>
    </div>
  </section>
        <center ><h2 style="align: center"> Les voitures les plus demandées</h2></center>
        <section>
          <div class="container">
            <div class="row">
              @foreach ($Voitures as $Voiture)
              <div class="col-md-4 mt-4">
                <a href="showCar/{{$Voiture->num_immatriculation}}">
                <div class="card profile-card-5">
                    <div class="card-img-block">
                        <img class="card-img-top" src='{{asset('imagess/'.$Voiture->url)}}' alt="Card image cap">
                    </div>
                        <div class="card-body pt-0">
                        <h5 class="card-title" style="font-size: 25px; color : #7468e2; " >{{$Voiture->marque}}</h5>
                        <p class="card-text" style="font-size: 20px">Modele: {{$Voiture->modele}}</p>
                        <p class="card-text" style="font-size: 20px">Annnée: {{$Voiture->annee}}</p>
                        <p class="card-text" style="font-size: 20px">Transmission: {{$Voiture->transmission}}</p>
                        
                        <p class="card-text" style="font-size: 20px">Nombre de portes: {{$Voiture->nombre_portes	}}</p>
                        <p class="card-text" style="font-size: 20px">Nombre de places: {{$Voiture->nombre_places}}</p>

                      </div>
                    </div>
                  </a>
            </div>

@endforeach

         
    		
    	</div>
    </div>
</section>

<div id="content" >
    <div class="news">@endsection