<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail\Mytestmail1;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Auth;
use App\Models\SeenMsg;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MsgController extends Controller
{
        function sendContact(Request $request){

            $contenu1=$request->input('First_name')." ".$request->input('Last_name');
            $contenu2="il a lemail  : ".$request->input('email');
            $contenu3="message :  ".$request->input('msg');

            $details = [
                'title' => 'Mail from Client',
                'body1' => 'Nom Prenom : '.$contenu1,    
                'body2' => $contenu2,
                'body3' => $contenu3,
            ];
$msg=$details['body1'] ."\n".$details["body2"]."\n".$details["body3"];  
           $message = new Reclamation();
           $message->id_user = 0;

           $message->objet = "Une question de client";
           $message->data=$msg;
           $message->save();
           $admins=DB::table('users')->where('role','admin')
           ->get();
foreach ($admins as $admin){
    $seen = new SeenMsg();
$seen->idUser=$admin->id;
$seen->idMsg= $message->id;
$seen->seen=0;
$seen->save();
 
} 

            Mail::to('erroukismail@gmail.com')->send(new \App\Mail\MyTestMail($details));
           
            Session()->flash('send','la voiture est supprimée avec succes');
            return redirect()->back();

        }

            public function urgentmessegae(Request $request){
                $details = [
                    'title' => 'Emergency Mail from Client',
                    'body1' => 'Nom Prenom :    '.$request->name,
                    'body2' => 'longitude :     '.$request->latitude,
                    'body3' => 'longitude :    '.$request->longitude,
                    'body4' => 'Email  :    '.$request->email,
                    'em'=>'ACCIDENT',
                ];
                $msg=$details['body1'] ."\n".$details["body4"];  
                Mail::to('erroukismail@gmail.com')->send(new \App\Mail\Mytestmail1($details));
                $message = new Reclamation();
                $message->id_user = Auth::user()->id;
                $message->objet = "Une message urgent de client (Cas accident)";
                $message->data=$msg;
                $message->latitude = $request->latitude;
                $message->longitude=$request->longitude;
                $message->save();
                $admins=DB::table('users')->where('role','admin')
                ->get();
     foreach ($admins as $admin){
         $seen = new SeenMsg();
     $seen->idUser=$admin->id;
     $seen->idMsg= $message->id;
     $seen->seen=0;
     $seen->save();
      
     } 
                Session()->flash('send','la voiture est supprimée avec succes');
                return redirect()->back();
            }


}
