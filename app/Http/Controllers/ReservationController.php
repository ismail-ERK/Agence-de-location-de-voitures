<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function getReservations(){
        // $clients=User::paginate(5);
        $locations=DB::table('locations')->paginate(5);

               return view('admin.reservation')->with('locations',$locations);
           }
           public static  function getReservationClient($id){

            $user=DB::table('users')->where('id',$id)->first();
                   return $user;
                
               }
               public static  function getReservationCar($num){
                // $clients=User::paginate(5);
                $voiture=DB::table('voitures')->where('num_immatriculation',$num)->first();

       
                    
                       return $voiture;
                   }

                   public static  function getReservationCarImg($num){
                    $voiture = DB::table("voitures")
                    ->select("images.url")
                    ->leftJoin('images', 'voitures.num_immatriculation', '=', 'images.num_immatriculation')
                    ->where("voitures.num_immatriculation","=",$num)
                    ->first();
                           return $voiture;
                       }
                       public   function showReservation($id){
                        $location = DB::table("locations")
                        ->where("id_location","=",$id)
                        ->first();
                        $voiture = DB::table("voitures")
                        ->Join('locations', 'locations.num_immatriculation', '=', 'voitures.num_immatriculation')
                        ->where("id_location","=",$id)
                        ->first();
                        $user = DB::table("users")
                        ->Join('locations', 'locations.id_user', '=', 'users.id')
                        ->where("id_location","=",$id)      
                           ->first();
                           $images360=DB::table('images')->where('num_immatriculation',$voiture->num_immatriculation)->where('type','360')->get();
                            $images=DB::table('images')->where('num_immatriculation',$voiture->num_immatriculation)->where('type','normal')->get();
                                  
                        return view('admin.showReservation')->with('location',$location)->with('voiture',$voiture)->with('user',$user)
                        ->with('images',$images)->with('images360',$images360);
                    }
                       

}