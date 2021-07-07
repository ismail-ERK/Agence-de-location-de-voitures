<?php

namespace App\Http\Controllers;
use App\Models\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    
  
    public function getClients(){
        // $clients=User::paginate(5);
        $clients=DB::table('users')->where('role','user')->paginate(5);

               return view('admin.client')->with('clients',$clients);
           }
           public static   function getNombreLocations($id){
          
            $count = DB::table('locations')->where('id_user', '=', $id)->count();
           return $count;
           }

           public function deleteClient($id){
            $clients=DB::table('users')->where('id',$id);
            $clients->delete();
           
            $clients=DB::table('users')->where('role','user')->paginate(5);
            $clients=DB::table('users')->where('role','user')->paginate(5);
            $locations=DB::table('locations')->where('id_user',$id);
            $reclamations=DB::table('reclamations')->where('id_user',$id);
            $locations->delete();
            $reclamations->delete();
            
            Session::put('delete','le client est supprimée avec succes');
            return redirect('/client')->with('clients',$clients);

            
        }
           
           
   
           public function ProfilClient($id){
            $locations=DB::table('locations')->where('id_user',$id)->paginate(5);

            $profils=DB::table('users')->where('id',$id)->get();

            return view('admin.ProfilClient')->with('profils',$profils)->with('locations',$locations);
           }
}
