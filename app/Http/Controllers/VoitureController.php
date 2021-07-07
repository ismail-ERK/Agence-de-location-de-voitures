<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Events\EventAlert;
use App\Models\Agence;
use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Session;
class VoitureController extends Controller
{
    public function getVoitures(){
 $voitures=Voiture::paginate(5);

            
return view('admin.voiture')->with('voitures',$voitures);

           
    }
    public function getAgences(){
        $agences=Agence::get();
               return $agences;
       
           }
          public function save_voiture_update(Request $request){
               
                $voitures=DB::table('voitures')
                ->where ('num_immatriculation',$request->num_immatriculation)
                ->update(['marque'=>$request->marque,
                'modele'=>$request->modele,
                'couleur'=>$request->couleur,
                'annee'=>$request->annee,
                'transmission'=>$request->transmission,
                'nombre_places'=>$request->nombre_places,
                'nombre_portes'=>$request->nombre_portes,
                'prix_jour'=>$request->prix_jour,
                'categorie'=>$request->cat
          ]);

                Session::put('update','la voiture  est modifiée avec succes');
                return redirect("showCar/$request->num_immatriculation");        
            
        }
          
           public function deleteVoiture($num){
            $voitures=DB::table('voitures')->where('num_immatriculation',$num);
            $ratings=DB::table('ratings')->where('num_immatriculation',$num);
            $locations=DB::table('locations')->where('num_immatriculation',$num);
            $voitures->delete();
            $ratings->delete();
            $locations->delete();
  Session::put('delete','la voiture est supprimée avec succes');
            return redirect('/voiture');}
            
    public function showCar($num){
     
        $voitures=DB::table('voitures')->where('num_immatriculation',$num)->get();
        $images360=DB::table('images')->where('num_immatriculation',$num)->where('type','360')->get();
        $images=DB::table('images')->where('num_immatriculation',$num)->where('type','normal')->get();

        return view('admin.showCar')->with('voitures',$voitures)->with('images',$images)->with('images360',$images360);
       
       
           }
    public function addVoiture(){
        $agences=Agence::get();
        $categories=Categorie::get();
               return view('admin.addVoiture')->with('agences',$agences)->with('categories',$categories);
       
           }
           
           public function addVoitureInAgence($id){
            $agences=DB::table('agences')->where('id_agence',$id)->get();
            $categories=Categorie::get();
                   return view('admin.addVoiture')->with('agences',$agences)->with('categories',$categories);
           
               }
           public function updateVoiture($num){
            $agences=Agence::get();
            $categories=Categorie::get();
            $voitures=DB::table('voitures')->where('num_immatriculation',$num)->get();
            $images360=DB::table('images')->where('num_immatriculation',$num)->where('type','360')->get();
            $images=DB::table('images')->where('num_immatriculation',$num)->where('type','normal')->get();
    
            return view('admin.updateVoiture')->with('voitures',$voitures)->with('agences',$agences)->with('images',$images)->with('images360',$images360)->with('categories',$categories);
           
           
               }
               public function deleteImage($num,$id){

                $images=DB::table('images')->where('id',$id);
                $images->delete();
                Session::put('deleteImg','l\'image est supprimée avec succes');
                             

                return redirect('/showCar/updateVoiture/'.$num);
               
                   }
               
           public function save_voiture (Request $request ){
            // broadcast(new EventAlert($request->num_immatriculation) );
            
            $voiture =new Voiture();
            $voiture->num_immatriculation=$request->num_immatriculation;
            $voiture->modele=$request->modele;
            $voiture->marque=$request->marque;
            $voiture->couleur=$request->couleur;
            $voiture->transmission=$request->transmission;
            $voiture->nombre_places=$request->nombre_places;
            $voiture->nombre_portes=$request->nombre_portes;
            // $voiture->prix_jour=$request->prix_jour;
            $voiture->categorie=$request->cat;
            $voiture->disponible=true;
            $voiture->prix_jour=$request->prix_jour;
            $voiture->id_agence =$request->ag;
            $voiture->annee =$request->annee;
            // $voiture->id_agence= $request->input('id_agence');
            
            $voiture->save();
         
            Session::put('success','la voiture est ajouter avec succes');
            return redirect('/add_voiture');}


            public function save_img_voiture (Request $request ){
                $images =new Image();
                $images->url =$request->file->hashName();
                $images->type ="normal";
                $images->num_immatriculation =$request->num_immatriculation;
                $request->file->move(public_path('imagess'), $request->file->hashName());
                $images->save();
                Session::put('success','l\'image est ajouter avec succes');
                return redirect('/showCar/updateVoiture/'.$request->num_immatriculation);
            }
            public function save_img_voiture_360 (Request $request ){
                $images =new Image();
                $images->url =$request->img;
                $images->type ="360";
                $images->num_immatriculation =$request->num_immatriculation;
                $images->save();
                Session::put('success','l\'image est ajouter avec succes');
                return redirect('/showCar/updateVoiture/'.$request->num_immatriculation);
            }
}