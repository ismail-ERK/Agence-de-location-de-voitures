<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//code.tidio.co/w48kgbuw6ogkelcrgkvekp6jaycydrwo.js" async></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
    <style>
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 200px;
    height: 200px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}

    </style>
</head>

<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (Session::has('send'))
 <script>
     swal("SEND","{!! Session::get('success') !!}","success",{
    button:"ok",})
 
    </script> 

  @endif
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <title>Profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-2"><h1 style="text-decoration: none; float: right;"><a href="{{ url('/') }}" class="pull-right">Home</a></h1></div>

      <br>
          </div>
          <div class="row">
      
            <div class="col-sm-10"><h2>Welcome  Mr. {{ Auth::user()->name }}</h2></div>
            <br>
                </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
        {{-- <img src="{{asset('imagess/'.$user->imageUs) }}" alt="hi"> --}}

        <div class="account-settings">
          <div class="user-profile">
              
              <div class="user-avatar">
                  <img src='{{asset('imagess/'.$user->imageUs) }}' alt="Maxwell Admin">
              </div>
             
          
          </div>
 
      </div>
      <form class="form" action="{{ url('SavePic/'.$user->id) }}" method="post" id="registrationForm" enctype="multipart/form-data">
        {{csrf_field()}}

        <h6>Upload a different photo...</h6>
      
      <input type="file" name="file" class="text-center center-block file-upload"><br>
<input type="submit" value="Changer l'image" class="btn btn-success">
      </form>

<div class="text-center">
        <form class="form" action="{{ url('SaveInfo/'.$user->id) }}" method="post" id="registrationForm" enctype="multipart/form-data">
      </div>
      <br>
        </div><!--/col-3-->
    	<div class="col-sm-9">
         

              
          <div class="tab-content">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Mes infos</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">Mes reservations</a>
                <a class="nav-item nav-link" href="#p3" data-toggle="tab">Urgent</a>
              </nav>
               
<div class="tab-content">
    <div class="tab-pane active" id="p1">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Name </h4></label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Name" title="enter your name if any." value="{{$user->name}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email" title="enter your email if any." value="{{$user->email}}">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any." value="{{$user->tel}}">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>CIN</h4></label>
                              <input type="text" class="form-control" name="CIN" id="CIN" placeholder="enter mobile number" title="enter your CIN if any."  value="{{$user->CIN}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="permit"><h4>Permit</h4></label>
                              <input type="text" class="form-control" name="permit" id="permit" placeholder="Votre permit" title="enter your permit." value="{{$user->Permit}}">
                          </div>
                      </div>
                      
                    
                    
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              
            </div>
              
             
            <div class="tab-pane" id="p2">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Marque</th>
      <th scope="col">Date debut</th>
      <th scope="col">Date Fin </th>
      <th scope="col">Ville agence </th>


    </tr>
  </thead>
  <tbody>
      @foreach ($vars as $var)
          
    <tr>
      <td>{{$var->marque}}</td>
      <td>{{$var->dateDL}}</td>
      <td>{{$var->dateFL}}</td>
      <td>{{$var->ville}}</td>
      <td><a class="btn btn-info" href="{{ url('infoRes/'.$var->id_location) }}">info</a></td>

    </tr>
    @endforeach
  </tbody>
</table>



            </div>















            <div class="tab-pane" id="p3">
                <h2>Cas d'accident</h2>
                <br>


            <button onclick="getLocation()">Upload your location</button>
            <br>
                <p id="demo"></p>
                <form action="{{ url('urgent')}}" method="POST">
                    @csrf

                    {{ csrf_field() }}
                    <input type="text" name="name"class="form-control" id="name" value="{{$user->name}}">
                    <br>
                    <input type="text" name="email" class="form-control" id="name" value="{{$user->email}}">
                    <br>

            <input type="text" class="form-control" name="latitude" id="latitude">
            <br>
            <input type="text" class="form-control" name="longitude" id="longitude">

            <br>
           
           <input type="submit" class="btn btn-danger" style="color: white;width: 30%;" value="Send-now">
           </form> </div>

                <script>
        
                    var latitude;
                    var longitude;
                    function getLocation() {
                      if (navigator.geolocation) {
                        navigator.geolocation.watchPosition(showPosition);
                      } else { 
                        x.innerHTML = "Geolocation is not supported by this browser.";
                      }
                    }
                        
                    function showPosition(position) {
                        latitude= position.coords.latitude; 
                        longitude= position.coords.longitude;
                        document.getElementById("latitude").value = latitude;
                        document.getElementById("longitude").value = longitude;

                    //     document.getElementById('latitude').innerHTML=latitude;
                    // document.getElementById('longitude').innerHTML=longitude;

                    }
                  
                    </script>

          
             </div><!--/tab-pane-->
             
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                    
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});
});
</script>



</body>
</html>