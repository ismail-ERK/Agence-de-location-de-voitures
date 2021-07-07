<?php

namespace App\Http\Controllers;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class UploadController extends Controller
{
    
public function upload(Request $req){
 

    $details=[
        'title' => 'Mail from Errouk Ismail',
        'file' => $req->file('uploadFile'),
        
        // 'body' => $req->file('file')->store('docs');
    ];

    Mail::to('ismailerrouk9@gmail.com')->send(new MyTestMail($details));
return "Email sent";
}
}