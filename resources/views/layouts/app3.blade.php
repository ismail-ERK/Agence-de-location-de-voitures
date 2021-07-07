<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    
     <link rel="stylesheet"  href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/aos.css') }}">
    


    {{-- charts------------------- --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/helpers.esm.min.js" integrity="sha512-4OeC7P+qUXB7Kpyeu1r5Y209JLXfCkwGKDpk8vnXzeNGMnpTr6hzOz2lMm7h0oxRBVu2ZCPRkCBPMmIlWsbaHg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/helpers.esm.js" integrity="sha512-DiXUm6brTaeEIei9FvCPPLvxLcf3ufH8g+aRTpSqhFhf+mSvndawwfaZiKx3Fqj1hbFua7OSXhb4ynoM9REc/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js" integrity="sha512-CAv0l04Voko2LIdaPmkvGjH3jLsH+pmTXKFoyh5TIimAME93KjejeP9j7wSeSRXqXForv73KUZGJMn8/P98Ifg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.esm.min.js" integrity="sha512-viBARNC43u175Exx9Fhcm985ysTEIrKagpWCl62NkxyVm9/Y7BylO+eVH8Kdsf7mKmyuF07Zypv2QQRYMmdNmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.esm.js" integrity="sha512-BDFtEx2x2jFpby9cxkGumnmLpRnaFqw8Y1c2y8rCYOCBBBFibmcNeL5MnvKbZOZxuqs1/qMsnmQvPu89d8epTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    





    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
    .table-responsive {
        margin: 10px 10px 0px 0px;
    }
    .table-wrapper {
        min-width: 1300px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 15px;
        background: #299be4;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .table-title .btn {
        color: #566787;
        float: right;
        font-size: 13px;
        background: #fff;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
        background: #f2f2f2;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 100px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.eyes {
        color: #13bd1b;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 2px;
    }
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    } 
      .news {
      
      padding: 5px;
    
      margin-top: 6.9%;
      margin-left:0.1%;
      margin-right: 60px;
      margin-bottom: 4%;
      font-size: 10px;
    }
    
  input[type=text],input[type=number],  select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

    
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
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
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
    </style>

<style>.avatar {
    position: relative;
    display: inline-block;
    width: 60px;
    white-space: nowrap;
    border-radius: 1000px;
    vertical-align: bottom
}

.avatar i {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 10px;
    height: 10px;
    border: 2px solid #fff;
    border-radius: 100%
}

.avatar img {
    width: 100%;
    max-width: 100%;
    height: auto;
    border: 0 none;
    border-radius: 1000px
}</style>
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
<?php
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\MessageController;
?>
  </head><body><div class="wrapper d-flex align-items-stretch" >
  <nav id="sidebar" style="background: #0f1822;">
    <div class="custom-menu">
      <button type="button" id="sidebarCollapse" class="btn btn-primary"  style="background: #d8c622;">
     </button>
    </div>
    <div class="img bg-wrap text-center py-4" style="background-image: url('{{asset('images/hero_1.jpg')}}');">
      <div class="user-logo">
        <div class="img" style="background-image: url('{{asset('images/person_2.jpg')}}');"></div>
        {{-- <h3>User name</h3> --}}
          <h3>{{ Auth::user()->name }}</h3>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              
          </div>
      
      </div>
    </div>

    <ul class="list-unstyled components mb-5">
      <li class="active">
        <a href="{{URL::to('/admin_dashboard')}}"><span class="fa fa-home mr-3"></span> Home</a>
      </li>
      <li>
          <a href="{{URL::to('/agence')}}"><span class="fa fa-building mr-3 "></span> Agences</a>
      </li>
     
      <li>
        <a href="{{URL::to('/voiture')}}"><span class="fa fa-car mr-3"></span> Voitures</a>
      </li>
      <li>
        <a href="{{URL::to('/client')}}"><span class="fa fa-users mr-3"></span> Clients</a>
      </li>
      <li>
      
        <a href="{{URL::to('/reclamation')}}"><span class="fa fa-exclamation-triangle mr-3 notif">
            @if (ReclamationController::getReclamationsnumber(Auth::user()->id)!='0')

           
            <small class="d-flex align-items-center justify-content-center">{{ReclamationController::getReclamationsnumber(Auth::user()->id )}}</small>
            @endif </span> Réclamations</a>

        {{-- <a href="{{URL::to('/reclamation')}}"><span class="fa fa-exclamation-triangle"></span> Réclamations</a>
        <div class="dropdown"> --}}
            
    </li>
    <li>
      
        <a href="{{URL::to('/message')}}"><span class="fa fa-commenting-o mr-3 notif">
            @if (MessageController::getReclamationsnumber(Auth::user()->id)!='0')

            <small class="d-flex align-items-center justify-content-center">{{MessageController::getReclamationsnumber(Auth::user()->id )}}</small>
            @endif 
        </span> Messages</a>
        {{-- <a href="{{URL::to('/reclamation')}}"><span class="fa fa-exclamation-triangle"></span> Réclamations</a>
        <div class="dropdown"> --}}
            
    </li>
      <li>
        <a href="{{URL::to('/reservation')}}"><span class="fa fa-address-book-o mr-3"></span> Réservations</a>
      </li>
      <li>
        <a href="{{URL::to('/statistiques')}}"><span class="fa fa-bar-chart mr-3"></span> Statistiques</a>
      </li>
    
      <li>
        <a href="{{URL::to('/ProfilAdmin')}}"><span class="fa fa-user mr-3"></span> Profil</a>
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
             <span class="fa fa-sign-out mr-3">   </span>  {{ __('Logout') }}
               
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
        {{-- <a href="#"><span class="fa fa-sign-out mr-3"></span> Sign Out</a> --}}
      </li>
    </ul>

  </nav>

    <!-- Page Content  -->
    @yield('content') 
    <script src="js2/popper.js"></script>
 {{-- <script src="js2/jquery.min.js"></script> --}}
   {{-- <script src="js/jquery-3.3.1.min.js"></script> --}}

    <script src="js2/bootstrap.min.js"></script>
    {{-- <script src="js2/main.js"></script> --}}

    {{-- <script src="js/popper.min.js"></script> --}}
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
	

    
  </body>
</html>