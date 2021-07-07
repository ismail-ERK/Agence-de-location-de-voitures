<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myTes extends Controller
{
    public function index(){

        $data=['name'=>'ismail','data'=>"hello ismail"];
        $user['to']='erroukismail@gmail.com';
        Mail::send('mail',$data,function($message) use ($user){
            $message->to($user['to']);
            $message->subject('hello ismail');

        })
}
