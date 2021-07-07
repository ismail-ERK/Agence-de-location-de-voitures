<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  // public function index() {
  //   return view('admin.dashboard');
  // }//l'originale
  public function index() {

    $VoituresCount =  DB::table('voitures')
    ->count();
    $AgenceCount =  DB::table('agences')
    ->count();
    $userCount =  DB::table('users')->where("role","=","user")
    ->count();
    $best3users=  DB::table('users')
    ->Join('locations', 'users.id', '=', 'locations.id_user')
    ->select('users.*',DB::raw('COUNT(*) as C'))
    ->groupBy('users.id')
    ->orderBy('c')
    ->paginate(3);
    // group by users.id order by c desc

    
    $Voitures = DB::table("voitures")
        ->select("images.url","voitures.*")
        ->leftJoin('images', 'voitures.num_immatriculation', '=', 'images.num_immatriculation')
        ->orderBy('value', 'desc')
        ->groupBy('num_immatriculation')
        ->paginate(3);
      $LocationCount =  DB::table("locations")
    ->count();
    return view('admin.dashboard')->with("VoituresCount",$VoituresCount)
    ->with("AgenceCount",$AgenceCount)
    ->with("userCount",$userCount)
    ->with("LocationCount",$LocationCount)
    ->with("Voitures",$Voitures)
    ->with("best3users",$best3users);
  }
}