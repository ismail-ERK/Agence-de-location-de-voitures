<?php

namespace App\Http\Controllers;
use App\Models\Voiture;
use App\Models\Agence;
use App\Models\Location;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Models\Chart;

class StatistiquesController extends Controller
{ public function statistiques(){
    $agences = Agence::all();

    $dataPoints = [];

    foreach ($agences as $agence) {

$count1 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 01)->count();
$count2 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 02)->count();
$count3 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 03)->count();
$count4 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 04)->count();
$count5 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 05)->count();
$count6 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 06)->count();
$count7 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 07)->count();

$count8 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=',07+1)->count();
$count9 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 07+2)->count();
$count10 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 10)->count();
$count11 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 11)->count();
$count12 = Location::where('id_agence','=',$agence->id_agence)->whereMonth('dateDL','=', 12)->count();


        $dataPoints[] = array(
            "name" => $agence['nom'],
       
            "data" =>[
                intval($count1),
                intval($count2),
                intval($count3),
                intval($count4),
                intval($count5),
                intval($count6),
                intval($count7),
                intval($count8),
                intval($count9),
                intval($count10),
                intval($count11),
                intval($count12),
            ],
        );
 


    }

            
//  $locs = Location::where('id_agence','=',$agence->id_agence)->get();
//   $start_date = \Carbon\Carbon::createFromFormat('YYYY-MM-DD',  $agence->dateDL);


//   $end_date = \Carbon\Carbon::createFromFormat('d-m-Y',  $agence->dateFL);
//  $different_days = $start_date->diffInDays($end_date);
//  dd($different_days);
    // SELECT SUM(DATEDIFF(dateFL, dateDL)*voitures.prix_jour)as prixtot
    //  FROM locations,voitures 
    //  where locations.num_immatriculation=voitures.num_immatriculation and locations.id_agence=1
        $dataPointsCA = [];

    foreach ($agences as $agence) {

    $CA1 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 01)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));

   
    $CA2 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 02)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));
     $CA3 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 03)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour")); 
    $CA4= DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 04)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));
     $CA5 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 05)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour")); 
    $CA6 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 06)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));
     $CA7= DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 07)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));
     $CA8 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 07+1)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));
     $CA9 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 07+2)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));
     $CA10 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 10)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));
     $CA11 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 11)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour")); 
    $CA12 = DB::table('locations')
    ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
    ->where('locations.id_agence', '=', $agence->id_agence)
    ->whereMonth('dateDL','=', 12)
    ->sum(DB::raw("DATEDIFF(dateFL,dateDL)*voitures.prix_jour"));

   
     
    
            $dataPointsCA[] = array(
                "name" => $agence['nom'],
           
                "data" =>[
                    intval($CA1),
                    intval($CA2),
                    intval($CA3),
                    intval($CA4),
                    intval($CA5),
                    intval($CA6),
                    intval($CA7),
                    intval($CA8),
                    intval($CA9),
                    intval($CA10),
                    intval($CA11),
                    intval($CA12),
                ],
            );
    

    }
    return view("admin.statistiques", 
    [
        "dataCA" => json_encode($dataPointsCA),
        "termsCA" => json_encode(array(
            "Janvier.",
            " Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Août",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre",



        )),
        "data" => json_encode($dataPoints),
        "terms" => json_encode(array(
            "Janvier.",
            " Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Août",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre",



        )),
        
    ],
);


}

}