<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Carbon\Carbon;
use App\Models\Voiture;
use App\Models\Image;
use App\Models\Rating;
use App\Models\Location;

use App\Models\Agence;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

// use App\Models\Categorie;

use App\Http\Controllers\CarController;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function indexV(){
        $Voitures = Voiture::all();
        return view('pages.Nos_voitures')->with('Voitures', $Voitures);
        
     }
     public function indexV_ordre1(){
        // $Voitures = Voiture::all();
        $Voitures =  DB::select("images.url,voitures.*")
        ->orderBy('nombre_location', 'desc')
        ->where('images.type','normal')
        ->get();
        return view('pages.Nos_voitures')->with('Voitures', $Voitures);
        
     }



     public function indexV_ordre2(){
        // $Voitures = Voiture::all();
        $Cars =  DB::table('voitures')
        ->select('marque')
        ->distinct()
        ->get();




        
        $Voitures = DB::table("voitures")
        ->select("images.url","voitures.*")
        ->leftJoin('images', 'voitures.num_immatriculation', '=', 'images.num_immatriculation')
        ->orderBy('value', 'desc')
        ->groupBy('num_immatriculation')
        ->get();
        return view('home')->with('Voitures', $Voitures)->with('Cars',$Cars);
        




     }




     public function indexVV(){
        $Voitures = Voiture::all();
        return view('home')->with('Voitures', $Voitures);
        ;
     }

        public function indexVC($nom){
         $ListeCategories = Categorie::all();
        // return view('pages.Nos_voitures',['categories' => $ListeCategories]);
         $Voitures =  DB::table("voitures")
         ->select("images.url","voitures.*")
         ->leftJoin('images', 'voitures.num_immatriculation', '=', 'images.num_immatriculation')
         ->where('categorie', $nom)
         ->groupBy('num_immatriculation')
         ->get();

         session()->now('pass','Voiture existe');

           return view('pages.Nos_voitures')->with('Voitures',$Voitures)->with('categories', $ListeCategories);
        }

        public function detailV($id){
            $Voiture = Voitures::find($id);
            return view('pages.detailV',['voiture'=>$Voiture]); 
        }

        // public function chercher(Request $request){
        //     $agence = Agence::find($request->input('ville'));
        //     $Voiture = Voitures::find($request->);
        //     return view('pages.detailV',['voiture'=>$Voiture]); 
        // } 





   public function search(Request $request){
   $min=$request->input('prix_min');
   $max=$request->input('prix_max');
       $request->validate([
         'D_debut'  =>  'required|date|after_or_equal:today',
         'D_fin'    =>  'required|date|after_or_equal:D_debut',
         'prix_min' => 'required|integer|max: '.$max,
         'prix_max' => 'required|integer|min: '.$min,
         

      ]);
$ville=$request->input('ville');
$nombre_potres=$request->input('portes');
$transmission=$request->input('transmission');
$prix_max=$request->input('prix_max');
$prix_min=$request->input('prix_min');
$modele=$request->input('modele');

$marque=$request->input('marque');
 $date_debut=$request->D_debut;
$date_fin=$request->D_fin;
// var_dump($marque);
// echo "<script>alert($date_debut);</script>";
// echo "<script>alert($date_fin);</script>";







session(['DD' => $date_debut]);

session(['DF' => $date_fin]);





$voitures = DB::table("voitures")
->select ("images.url","voitures.*")
->join('agences', 'voitures.id_agence', '=', 'agences.id_agence')
->leftJoin('images', 'voitures.num_immatriculation', '=', 'images.num_immatriculation')
->where('ville',$ville)
->where('modele',$modele)

->where('prix_jour','>=',$prix_min)
->where('prix_jour','<=',$prix_max)

->where('marque',$marque)
->where('nombre_portes',$nombre_potres)
->where('transmission',$transmission)
->whereNotIn('voitures.num_immatriculation',DB::table("locations")->select("num_immatriculation")
->where(function($query) use ($date_debut,$date_fin){
       $query->where('dateDL','>=',$date_debut)
       ->where('dateDL','<=',$date_fin);})
->orWhere(function($query) use ($date_debut){
       $query->where ('dateFL','>=',$date_debut)
       ->where('dateDL','<=',$date_debut);}
)
)
->groupBy('num_immatriculation')
->get();



// if (count($voitures)<=0) {
//    echo "<script>alert(\"nexiste pas\");</script>";
//    # code...
// }
// if (!$voitures->isEmpty()) {
//    echo "<script>alert(\"existe\");</script>";
//    # code...
// }

session()->now('ch','a');
return view("pages.voiture_rechercher",['cars'=>$voitures]);
   }










   public function louer(Request $request,$num_immatriculation){
      if (Auth::check()) {
         $request->validate([
            'date_d'  =>  'required|date|after_or_equal:today',
            'date_f'    =>  'required|date|after_or_equal:date_d',
         ]);
         
      $fdate = $request->input('date_d');
      $tdate = $request->input('date_f');
      $datetime1 = new \DateTime($fdate);
      $datetime2 = new \DateTime($tdate);
      $interval = $datetime1->diff($datetime2);
      $days = $interval->format('%a');
      session(['nombre_jour'=>$days]);


      session(['date_d'=>$request->input('date_d')]);
      session(['date_f'=>$request->input('date_f')]);
   


      
      $Voiture = DB::table("voitures")
      ->select ("*")
      ->where('num_immatriculation',$num_immatriculation)
      ->first();
      $prix = $Voiture->prix_jour * ($days+1);

      session(['prix'=>$prix]);

      session(['num'=>$Voiture->num_immatriculation]); 
      session(['ag'=>$Voiture->id_agence]);




      

   //    $location = new Location();
   //   $location->num_immatriculation=$num_immatriculation;
   //   $location->dateDL=$fdate;
   //   $location->dateFL=$tdate;

   //    $location->save();




      


     }else{
      session()->flash('message','existe');

       return redirect()->back();
     
      
       }


       return view('pages.paiement')->with("prix",$prix);
 


   }

   public function pour_louer($num_immatriculation){
    $voiture = DB::table("voitures")
    ->select ("*")
    ->where('num_immatriculation',$num_immatriculation)
    ->first();

   // $voiture =Voiture::find($num_immatriculation);

    $agence = DB::table("agences")
    ->select ("*")
    ->where('id_agence',$voiture->id_agence)
      ->first();


session(['transmission'=>$voiture->transmission]);
session(['marque'=>$voiture->marque]);
session(['num_immatriculation'=>$voiture->num_immatriculation]);
session(['modele'=>$voiture->modele]);
session(['annee'=>$voiture->annee]);

session(['nomAg'=>$agence->nom]);
session(['villeAg'=>$agence->ville]);
session(['adresseAg'=>$agence->adresse]);



return view("pages.Rent-now")->with("car",$voiture)->with("agence",$agence);




   }

public function infoV($id){
   $voiture=DB::table("voitures")
    ->select ("*")
    ->where('num_immatriculation',$id)
    ->first();
   $images=DB::table("images")
   ->select ("*")
   ->where('num_immatriculation',$id)
   ->where('type','normal')
   ->get();
   $image360=DB::table("images")
   ->select ("*")
   ->where('num_immatriculation',$id)
   ->where('type','360')
   ->first();
   $agence = DB::table("agences")
    ->select ("*")
    ->where('id_agence',$voiture->id_agence)
      ->first();
   return view("pages.infoVoiture")->with("voiture",$voiture)->with("images",$images)->with("image360",$image360)->with("agence",$agence);






}

public  static function  edit(Request $request){
   DB::update(' update voitures set voitures.value =(select AVG(ratings.value) from ratings where 
       ratings.num_immatriculation=?)  where voitures.num_immatriculation = ?',[$request->num_immatriculation,$request->num_immatriculation]);
        
}


public function rate_voiture (Request $request){
   $count=DB::table("ratings")
   
   ->where('num_immatriculation',$request->num_immatriculation)
   ->where('id',Auth::user()->id)
   ->count();
   if( $count >0 ){
      DB::update(' update ratings set value = ? where num_immatriculation = ? and id = ?' ,[$request->rating,$request->num_immatriculation,Auth::user()->id]);

    }else {
   $rating =new Rating();
   $rating->num_immatriculation=$request->num_immatriculation;
   $rating->id=Auth::user()->id;
   $rating->value=$request->rating;
   // $voiture->id_agence= $request->input('id_agence');
   
   $rating->save();
    }
   CarController::edit($request);
   
   session(['success','rating avec succes']);
  
  return redirect()->back();        
}






function info_res($id_location){
   
   $image = DB::table("locations")
   ->select("images.url")
   ->leftJoin('images', 'locations.num_immatriculation', '=', 'images.num_immatriculation')
   ->where("locations.id_location","=",$id_location)
   ->first();
 
   $vars = DB::table("locations")
   ->select ("voitures.*","locations.*","agences.ville")
   ->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
   ->leftJoin('images', 'voitures.num_immatriculation', '=', 'images.num_immatriculation')
   ->join('agences', 'locations.id_agence', '=', 'agences.id_agence')
   ->where('locations.id_location',$id_location)
   ->groupBy('voitures.num_immatriculation')
   ->first();
   return view('pages.info_reservation')->with('vars',$vars)->with('image',$image);
 







}


function back(){
   return redirect()->route('home');
}

function back_home(){
   return redirect()->route('home');

}
function back_nos_agences(){
   return redirect()->route('nos_agences');

}
function back_nos_voitures(){
   return redirect()->route('nos_voitures');

}


}
