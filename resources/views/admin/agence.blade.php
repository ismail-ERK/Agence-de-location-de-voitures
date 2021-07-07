@extends('layouts.app3')
@section('title')
    agences
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
     swal("Suppression","{!! Session::get('delete') !!}","delete",{
    button:"ok",})
 
    </script> 


  {{Session::put('delete',null)}}
  @endif

<?php
use App\Http\Controllers\AgenceController;
?>
<script>    
    $(document).ready(function () {
        refresh_Div();
    });

    var i = 1;
    function refresh_Div() {
        $('#books').empty();

        $.ajax({
            type: 'GET',
            url: '../../library/library.xml',
            dataType: 'xml',
            success: function (xml) {

                $(xml).find('List').each(function () {

                    if ($(this).find('code').text() == i) {
                        $('#books').append(
                        '<div>' +
                            '<div><b>Name of Book: </b>' +
                                $(this).find('BookName').text() + '</div> ' +
                            '<div><b>Category: </b>' +
                                $(this).find('Category').text() + '</div> ' +
                            '<div><b>Price: </b>' +
                                $(this).find('Price').text() + '</div> ' +
                        '</div>')
                        .hide().fadeIn(2000);
                    }
                });

                i = i + 1;
                if (i >= 3) i = 1;
            }
        });
    }

    var reloadXML = setInterval(refresh_Div, 5000);
</script>
 <div id="content" >
  <div class="news">
  


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                          <h2>Nos <b>Agence</b></h2>
                      </div>
                      <div class="col-sm-7">
                          <a href="{{URL::to('/add_agence')}}" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Ajouter une nouvelle agence</span></a>
                          {{-- <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>						 --}}
                      </div>
                  </div>
              </div>
              
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                          <th>Nom</th>
                          <th>Ville</th>						
                          <th>Adresse</th>
                          <th>Nombre de voitures</th>
                         
                          <th>modifie depuis</th>
                          <th>voir</th>
                          <th>Mise a jour</th>
                          <th>Supprimer</th>

                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($agences as $agence)
                    <tr>
                        <td>{{$agence->nom}}</td>
                        <td>{{$agence->ville}}</td>   
                        <td>{{$agence->adresse}}</td>
                        <td>{{AgenceController::getNombreVoiture($agence->id_agence)}}</td>
                        <td>{{\Carbon\Carbon::parse($agence->updated_at)->diffForHumans()}}</td>
                        {{-- <a  class="delete" title="Voir Info Agence" data-toggle="tooltip"><i class="material-icons">visibility</i></a> --}}
                      <td>
                        <a href="showAgence/{{$agence->id_agence}}" class="eyes" title="Modifier Voiture" data-toggle="tooltip"><span class="material-icons">
                            </span></td>
                        <td>
                            <a href="showAgence/updateAgence/{{$agence->id_agence}}" class="settings" title="Modifier Agence" data-toggle="tooltip"><span class="material-icons">
                              border_color
                              </span>        </td>     <td>    
                         <a href="showAgence/deleteAgence/{{$agence->id_agence}}" class="delete" title="Supprimer Agence" data-toggle="tooltip"><i class="material-icons">delete</i></a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
              <div class="clearfix">
                  <ul class="pagination">
                 
                        <li>{{ $agences->links() }}</li>
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