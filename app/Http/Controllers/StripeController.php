<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Voiture;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;
use Stripe;
use Session;

class StripeController extends Controller
{
    /**
     * payment view
     */
    
    public function handleGet()
    {
        return view('home');
    }
  
    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * session()->get('prix'),
                "currency" => "MAD",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
  
     Session()->flash('success', 'Payment has been successfully processed.');
          
     session(['id_user'=>Auth::id()]);
     $num_immatriculation=session()->get('num');
$insr = new Location();
$insr->id_agence=session()->get('ag');
$insr->num_immatriculation=$num_immatriculation;
$insr->id_user=session()->get('id_user');
$insr->dateDL=new \DateTime(session()->get('date_d'));
$insr->dateFL=new \DateTime(session()->get('date_f'));
$insr->id_user=session()->get('id_user');
$insr->save();

session(['id_location'=>$insr->id_location]);

$incr = DB::table('voitures')
->where('num_immatriculation', $num_immatriculation)
->update([
    'nombre_location' => DB::raw('nombre_location + 1'),
]);



$data["email"] = "erroukismail@gmail.com";
$data["title"] = "From Client";
$data["body"] = "This is Demo";

$pdf = PDF::loadView('emails.myPDFmail', $data);

Mail::send('emails.messageContrat', $data, function($message)use($data, $pdf) {
    $message->to($data["email"], $data["email"])
            ->subject($data["title"])
            ->attachData($pdf->output(), "text.pdf");
});

session()->flash('pdf_send','Mail sent successfully');


return redirect()->route('home');
    }
}