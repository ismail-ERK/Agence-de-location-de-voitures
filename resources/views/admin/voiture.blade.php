@extends('layouts.app3')
@section('title')
    voiture
@endsection

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (Session::has('delete'))
 <script>
     swal("Suppression","{!! Session::get('delete') !!}","success",{
    button:"ok",})
 
    </script> 

  {{Session::put('delete',null)}}
  @endif
  <div id="content" >
<div class="news">


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Nos <b>Voitures</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="add_voiture" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Ajouter une nouvelle voiture</span></a>
                        {{-- <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>						 --}}
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Marque</th>						
                        <th>Modele</th>
                        <th>Annee</th>
                        <th>Couleur</th>
                        <th>Categorie</th>
                        <th>Transmission</th>
                        <th>Nombre de portes</th>
                        <th>Nombre de places</th>
                        <th>Prix /jours</th>
                        <th>Nombre de locations</th>
                        <th>Etat</th>
                        <th>modifie depuis</th>
                        <th>voir</th>
                        <th>Mise a jour</th>
                        <th>Supprimer</th>

                    </tr>
                </thead>
                <tbody>
                  @foreach ($voitures as $voiture)
                  <tr>
                    <td>{{$voiture->num_immatriculation}}</td>
                    <td>{{$voiture->marque}}</td>   
                    <td>{{$voiture->modele}}</td>
                    <td>{{$voiture->annee}}</td>

                    <td>{{$voiture->couleur}}</td>
                    <td>{{$voiture->categorie}}</td>
                    <td>{{$voiture->transmission}}</td>
                    <td>{{$voiture->nombre_portes}}</td>
                    <td>{{$voiture->nombre_places}}</td>
                    <td>{{$voiture->prix_jour}}</td>
                    <td>{{$voiture->nombre_location}}</td>
                   @if ($voiture->disponible==0)
                   <td><span class="status text-danger">&bull;</span>non disponible</td>
                   @else
                   
                   <td><span class="status text-success">&bull;</span>disponible</td>
                   
                   @endif
                      <td>{{\Carbon\Carbon::parse($voiture->updated_at)->diffForHumans()}}</td>
                <td>   {{-- <td> <a href="showCar/{{$voiture->num_immatriculation}}" class="delete" title="Voir Info Voitures" data-toggle="tooltip"><i class="material-icons">remove_red_eye</i></a> --}}
                    <a  href="showCar/{{$voiture->num_immatriculation}}" class="eyes" title="Modifier Voiture" data-toggle="tooltip"><span class="material-icons">
                        remove_red_eye  </span> 
                        </td>
                         <td>
                      <a  href="showCar/updateVoiture/{{$voiture->num_immatriculation}}" class="settings" title="Modifier Voiture" data-toggle="tooltip"><span class="material-icons">
                        border_color  </span>                 
                    </td>
                        <td>
                               <a href="showCar/deleteVoiture/{{$voiture->num_immatriculation}}" class="delete" title="Supprimer Voiture" data-toggle="tooltip"><i class="material-icons">delete</i></a>
                    </td>

                </tr>
             
                </tbody>
                @endforeach
            </table>
            <div class="clearfix">
                {{-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> --}}
                <ul class="pagination">
                    <li>{{ $voitures->links() }}</li>
                    {{-- <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link"></a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li> --}}
                </ul>
            </div>
        </div>
        
    </div>
</div>     
</div>     


@endsection