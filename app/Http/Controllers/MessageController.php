<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Auth;
use Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function getMessages(){
        $reclamations = DB::table("reclamations")
       ->select("reclamations.*","seen_msgs.seen","users.*","reclamations.id as idR")
       ->leftJoin('users', 'reclamations.id_user','=', 'users.id')
       ->Join('seen_msgs', 'reclamations.id', '=', 'seen_msgs.idMsg')
       ->where("seen_msgs.idUser","=",Auth::user()->id )
       ->where("reclamations.id_user","=",'0')
       ->get();
       $seen=DB::table('seen_msgs')
       ->Join('reclamations', 'reclamations.id', '=', 'seen_msgs.idMsg')
       ->where("seen_msgs.idUser","=",Auth::user()->id )
       ->where("reclamations.id_user","=",'0')
       ->update(['seen_msgs.seen'=>1
          ]);

              return view('admin.message')->with('reclamations',$reclamations);
          
              
          }

          
          public  static function getReclamationsnumber($id){
            $count = DB::table("reclamations")
           ->select("*")
           ->Join('seen_msgs', 'reclamations.id', '=', 'seen_msgs.idMsg')
           ->where("seen_msgs.idUser","=", $id)
           ->where("seen_msgs.seen","=", 0 )

           ->where("reclamations.id_user","=",'0')

           ->count();
   
return $count;                  
                  
              } 
}