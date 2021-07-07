<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AgenceController;
use App\Models\Agence;
use App\Models\Voiture;
use App\Models\Image;
use App\Models\Rating;

use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;

class AgenceController extends Controller
{
   public function indexA(){
    $Agences = Agence::all();
    return view('pages.Nos_agences')->with('Agences', $Agences);
   }


   

   public function chaque_agence($id){
      $agence = Agence::select("*")
      ->where('id_agence', $id)
      ->first();
      
      $Voitures =  DB::table("voitures")
      ->select("images.url","voitures.*")
         ->where('id_agence', $id)
        ->leftJoin('images', 'voitures.num_immatriculation', '=', 'images.num_immatriculation')
        ->groupBy('num_immatriculation')
        ->get();







      return view('pages.Mes_agences')->with('Voitures',$Voitures)->with('agence', $agence); 
  }

  public function confirm(){
    
session()->flash('vv','ok');





      return redirect()->back(); 
  }




   //----------------------
   public function getAgences(){
    
      $agences=Agence::paginate(5);
             return view('admin.agence')->with('agences',$agences);
     

         }
         public static   function getNombreVoiture($id_agence){
        
          $count = DB::table('voitures')->where('id_agence', '=', $id_agence)->count();
         return $count;
         }

         
         public function showAgence($id){
   
      $agences=DB::table('agences')->where('id_agence',$id)->get();
      $voitures =DB::table('voitures')->where('id_agence',$id)->paginate(5);
      return view('admin.showAgence')->with('agences',$agences)->with('voitures',$voitures);
     
  
      }

      public function deleteAgence($id){
          $agences=DB::table('agences')->where('id_agence',$id);
          $voitures=DB::table('voitures')->where('id_agence',$id);

          $voitures->delete();
          $agences->delete();

          
          Session::put('delete','l\'agence est supprimée avec succes');
          return redirect('/agence');}

          public function addAgence(){
              return view('admin.addAgence');
      }
      
          
         public function updateAgence($id){
 
          $agences=DB::table('agences')->where('id_agence',$id)->get();
          $voitures =DB::table('voitures')->where('id_agence',$id)->paginate(5);

          return view('admin.updateAgence')->with('agences',$agences)->with('voitures',$voitures);
         
        
             }

             public function save_agence_update(Request $request){
   
               $agences=DB::table('agences')
               ->where ('id_agence',$request->id)
               ->update(['nom'=>$request->nom,
               'ville'=>$request->ville,
               'adresse'=>$request->adresse,
               'latitude'=>$request->lat,
               'longitude'=>$request->long,
                  ]);
                  Session::put('update','l\'agence  est modifiée avec succes');
                  return redirect("showAgence/$request->id");        
              
           //    echo("hello");
   
   
                  }
             public function save_img_agence (Request $request ){
                 var_dump($request->id);   
                 $images =new Image();
                 $images->url =$request->file->hashName();
                 $images->type ="normal";
                 $images->num_immatriculation =$request->num_immatriculation;
 
                 $request->file->move(public_path('imagess'), $request->file->hashName());
                 // $voiture->id_agence= $request->input('id_agence');
                 $images->save();
              
 
                 Session::put('success','l\'image est ajouter avec succes');
                 return redirect('/showCar/updateVoiture/'.$request->num_immatriculation);
                   
                }
          
             public function save_agence (Request $request ){
                 
              $agence =new Agence();
              
              
              $agence->ville =$request->ville;
              // "file_path" => $request->file->hashName()
              $agence->nom =$request->nom;
              $agence->adresse =$request->adresse;
              // $request->file->move(public_path('images'), $request->file->hashName());
              // $voiture->id_agence= $request->input('id_agence');
              $agence->save();
           

              Session::put('success','l\'agence est ajouter avec succes');
              return redirect('/add_agence');
          }
          public function deleteImage360 ($id ){
                   
            $agences=DB::table('agences')
            ->where ('id_agence',$id)
            ->update(['image360'=>NULL,]);

            Session::put('success','l\'image 360 est supprimée avec succes');
            return redirect('/showAgence/updateAgence/'.$id);
        } 

        public function save_img_agence_360 (Request $request ){
         $agences=DB::table('agences')
         ->where ('id_agence',$request->id)
         ->update(['image360'=>$request->img360,]);
            Session::put('success','l\'image est ajouter avec succes');
            return redirect('/showAgence/updateAgence/'.$request->id);
              
           }
        public function deleteImage ($id ){
                   
         $agences=DB::table('agences')
         ->where ('id_agence',$id)
         ->update(['imageAg'=>NULL,]);

         Session::put('success','l\'image  est supprimée avec succes');
         return redirect('/showAgence/updateAgence/'.$id);
     } 
}
