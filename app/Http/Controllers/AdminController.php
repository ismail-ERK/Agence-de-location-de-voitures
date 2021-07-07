<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function ProfilAdmin(){

    return view('admin.profilAdmin');
   }
   public function statistiques(){

      return view('admin.statistiques');
     }
     public function update_profil(Request $request){
           
      $var = User::find(Auth::user()->id);
      $var->name=$request->input('name');      
      $var->email=$request->input('email');  
      $var->CIN=$request->input('CIN');  
      $var->tel=$request->input('phone');  
      $var->Permit=$request->input('Permit');         
       $var->save();
 // $url =$request->image->hashName();

 // $request->image->move(public_path('images\admin'), $request->image->hashName());
// var_dump($request->i);
// var_dump($request->fullName);
//       $users=DB::table('users')
//       ->where ('id',Auth::user()->id)
//       ->update(['nom'=>$request->fullName,
//       'email'=>$request->email,

// ]);

 Session::put('update','le Profil est modifié avec succes');
 return redirect("/ProfilAdmin");  
} 

      function update_pic_profil(Request $request){
           
           $var = User::find(Auth::user()->id);
           $var->imageUs =$request->file->hashName();
           $request->file->move(public_path('imagess'), $request->file->hashName());          
            $var->save();
      // $url =$request->image->hashName();
   
      // $request->image->move(public_path('images\admin'), $request->image->hashName());
// var_dump($request->i);
// var_dump($request->fullName);
//       $users=DB::table('users')
//       ->where ('id',Auth::user()->id)
//       ->update(['nom'=>$request->fullName,
//       'email'=>$request->email,
   
// ]);

      Session::put('update','le Profil est modifié avec succes');
      return redirect("/ProfilAdmin");  
     } 
}
