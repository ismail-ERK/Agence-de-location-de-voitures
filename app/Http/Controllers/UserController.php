<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Voiture;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

use App\Models\Agence;
use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function infos($nom){
$user = User::find($nom);
$vars = DB::table("locations")
->select ("voitures.*","locations.*","agences.ville")
->join('voitures', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
->join('agences', 'locations.id_agence', '=', 'agences.id_agence')
->where('locations.id_user',$nom)
->get();
return view('pages.profil')->with('user',$user)->with('vars',$vars);


   }
        public function SaveInfos(Request $request,$id){
      

            $monProfin = User::find($id);
            
           
         
        
        
                

            $validated = $request->validate([
                'name' => 'required |min:7|max:30',
                'email' => 'required |min:5|max:30',
                'phone' => 'required |min:9|max:11',
                'CIN' => 'required |min:5|max:30',
                'permit' => 'required |min:5|max:30',
                'imageUs.*' => 'mimes:jpeg,jpg,png,gif'
            ]);
            // $voiture->id_agence= $request->input('id_agence');

         
           
            $monProfin->name=$request->input('name');      
            $monProfin->email=$request->input('email');  
            $monProfin->CIN=$request->input('CIN');  
            $monProfin->tel=$request->input('phone');  
            $monProfin->Permit=$request->input('permit');    
         
            $monProfin->save();
              
                
              
            


    return  redirect()->back();

        }

        public function SavePic(Request $request,$id){
      

            $monProfin = User::find($id);
            
           
         
        
        
                

            // $voiture->id_agence= $request->input('id_agence');

         
            
            $monProfin->imageUs =$request->file->hashName();
            $request->file->move(public_path('imagess'), $request->file->hashName());
            $monProfin->save();
              
                
              
            


    return  redirect()->back();

        }


 
}
