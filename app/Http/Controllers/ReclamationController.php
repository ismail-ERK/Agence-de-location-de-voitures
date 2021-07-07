<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Auth;
use Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class ReclamationController extends Controller
{
    public function getReclamations(){
         $reclamations = DB::table("reclamations")
        ->select("reclamations.*","seen_msgs.seen","users.*","reclamations.id as idR")
        ->leftJoin('users', 'reclamations.id_user','=', 'users.id')
        ->Join('seen_msgs', 'reclamations.id', '=', 'seen_msgs.idMsg')
        ->where("seen_msgs.idUser","=",Auth::user()->id )
        ->where("reclamations.id_user","<>",'0')
        ->get();
        

               return view('admin.reclamation')->with('reclamations',$reclamations);
           
               
           }

           public function getReclamationsinfo($id){
            $seen=DB::table('seen_msgs')
            ->where ('idMsg',$id)
            ->where ('idUser',Auth::user()->id )
            ->update(['seen'=>1
               ]);
            $reclamations = DB::table("reclamations")
           ->select("reclamations.*","users.*")
           ->leftJoin('users', 'reclamations.id_user', '=', 'users.id')
           ->where("reclamations.id","=",$id)
           ->get();
   
                  return view('admin.reclamationInfo')->with('reclamations',$reclamations);
              
                  
              }  
              public  static function getReclamationsnumber($id){
                $count = DB::table("reclamations")
               ->select("*")
               ->Join('seen_msgs', 'reclamations.id', '=', 'seen_msgs.idMsg')
               ->where("seen_msgs.idUser","=", $id)
               ->where("seen_msgs.seen","=", 0 )

               ->where("reclamations.id_user","<>",'0')

               ->count();
       
return $count;                  
                      
                  } 
}