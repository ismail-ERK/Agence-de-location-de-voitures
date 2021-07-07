<!DOCTYPE html>
<html>
<head>
    <title>Contrat Client</title>
</head>
<body>
    <h1 style="text-align: center;">CONTRAT DE LOCATION VEHICULE</h1>
    <h2 style="color: red;text-align: center;">Contrat n° : {{session()->get('id_location')}}</h2>
    <img src="{{asset('imagess/'.Auth::user()->imageUs)}}" alt="">


    <h4> ENTRE Agence : {{session()->get('nomAg')}}</h4>
    <h4>Adresse : {{session()->get('adresseAg')}} {{session()->get('villeAg')}}</h4>

    </h4>Propriétaire du véhicule :</h4>
    </h4>Marque {{session()->get('marque')}}</h4>
    </h4>Modele {{session()->get('modele')}}</h4>

    <h4> Type de transmission {{session()->get('transmission')}}</h4>
        <h4>Année {{session()->get('annee')}}</h4>
            <h4>Immatriculation {{session()->get('num_immatriculation')}}</h4>           
       <br>
             <h4>  ET M. {{Auth::user()->name}} </h4>
    
           <h4>CIN {{Auth::user()->CIN}} </h4>
           <h4>Permit {{Auth::user()->Permit}} </h4>

           <h4> Tél {{Auth::user()->tel}} </h4>
 
     <h4> A été stipulé ce qui suit :</h4>
     <br><br>  
     <h4>   DUREE DU CONTRAT</h4>

            <h4> Durée de la location : {{session()->get('date_d')}} à partir du {{session()->get('date_f')}}</h4>
    
                <h4> Prix   {{session()->get('prix')}} DH</h4>
    
<h3>Merci pour votre confiance </h3>
</body>
</html>