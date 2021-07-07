<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Controllers\myTest;
use App\Controllers\UploadController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\StatistiquesController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoitureController;

use App\Http\Controllers\CarController;
use App\Http\Controllers\MsgController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',[CarController::class,'indexVV']);
// Route::get('/home',[CarController::class,'indexVV']);
Route::get('/welcome', function () {
    return view('home');
});
Route::get('/rent', function () {
    return view('pages.Rent-now');
});
Route::get('profil/{nom}',[UserController::class,'infos'])->name('profil');
Route::get('/about', function () {
    return view('pages.About_us');
});

Route::get('/nos_voitures/{nom}',[CarController::class,'indexVC']);
// Route::get('/nos_voitures',[CategoriesController::class,'indexC']);

Route::get('/nos_voitures',[CategoriesController::class,'afficheA'])->name('nos_voitures');
// Route::get('/nos_voitures',[CarController::class,'indexV_ordre1']);
Route::get('/nos_agences',[AgenceController::class,'indexA'])->name('nos_agences');
Route::get('/ma_voiture',[CarController::class,'search']);

Route::put('/SaveInfo/{id}',[UserController::class,'SaveInfos']);
Route::post('/SavePic/{id}',[UserController::class,'SavePic']);


Route::post('/urgent',[MsgController::class,'urgentmessegae']);



Route::get('/contact', function () {
    return view('pages.contact_us');
});

Route::get('/mg', function () {
    return view('pages.Mes_agences');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\CarController::class, 'indexV_ordre2']);
Route::get('/home', [App\Http\Controllers\CarController::class, 'indexV_ordre2'])->name('home')->middleware('role:user');

Route::get('/index',[App\Http\Controllers\TestController::class,'index']);

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('upload',[App\Http\Controllers\UploadController::class,'upload']);

Route::get('detail/{id}', [App\Http\Controllers\CarController::class,'indexV']);


Route::get('detailAg/{id}', [App\Http\Controllers\AgenceController::class,'chaque_agence']);
Route::get('chercher', [App\Http\Controllers\CarController::class,'search']);
Route::get('sendContact', [App\Http\Controllers\MsgController::class,'sendContact']);
Route::get('louer/{num_immatriculation}', [App\Http\Controllers\CarController::class,'pour_louer']);


Route::get('louer1/{num_immatriculation}', [App\Http\Controllers\CarController::class,'louer'])->middleware(['auth']);


Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
Route::get('/infoV/{id}',[CarController::class,'infoV']);
Route::get('/infovv',[AgenceController::class,'confirm']);
Route::post('/rate_voiture',[CarController::class,'rate_voiture'] );


// -----------------ADMIN--------------------------
Route::get('/admin_dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('role:admin');;



// gestion des clients

Route::get('/client',[ClientController::class,'getClients'] );
Route::get('/ProfilClient/{id}',[ClientController::class,'ProfilClient'] );

// ---------------Reservations-------------------
Route::get('/reservation',[ReservationController::class,'getReservations'] );
Route::get('/showReservation/{id}',[ReservationController::class,'showReservation'] );

// gestion des agences
Route::get('/agence',[AgenceController::class,'getAgences'] );
Route::get('/showAgence/{id}',[AgenceController::class,'showAgence'] );
Route::get('/showAgence/deleteAgence/{id}',[AgenceController::class,'deleteAgence'] );
Route::get('/add_agence',[AgenceController::class,'addAgence'] );
Route::post('/save_agence',[AgenceController::class,'save_agence'] );
Route::post('/save_img_agence',[AgenceController::class,'save_img_agence'] );
Route::post('/save_img_agence_360',[AgenceController::class,'save_img_agence_360'] );

Route::get('/showAgence/updateAgence/deleteImage/{id}',[AgenceController::class,'deleteImage'] );
Route::get('/showAgence/updateAgence/deleteImage360/{id}',[AgenceController::class,'deleteImage360'] );

Route::get('/showAgence/updateAgence/{id}',[AgenceController::class,'updateAgence'] );

Route::post('/save_agence_update',[AgenceController::class,'save_agence_update'] );
//  gestion des voitures

Route::get('/voiture',[VoitureController::class,'getVoitures'] );
Route::get('/add_voiture',[VoitureController::class,'addVoiture'] );
Route::get('showAgence/add_voiture/{id}',[VoitureController::class,'addVoitureInAgence'] );
Route::post('/save_voiture',[VoitureController::class,'save_voiture'] );
Route::post('/save_img_voiture',[VoitureController::class,'save_img_voiture'] );
Route::post('/save_img_voiture_360',[VoitureController::class,'save_img_voiture_360'] );

Route::post('/rate_voiture',[RatingController::class,'rate_voiture'] );

Route::post('/rate_voiture',[RatingController::class,'rate_voiture'] );
Route::post('/save_voiture_update',[VoitureController::class,'save_voiture_update'] );

Route::get('showCar/updateVoiture/{num}',[VoitureController::class,'updateVoiture'] );
Route::get('showCar/updateVoiture/deleteImage/{num}/{id}',[VoitureController::class,'deleteImage'] );

Route::get('/showCar/{num}',[VoitureController::class,'showCar'] );
Route::get('/showCar/deleteVoiture/{num}',[VoitureController::class,'deleteVoiture'] );

//admin profil
Route::get('/ProfilAdmin',[AdminController::class,'ProfilAdmin'] );
Route::POST('/update_profil',[AdminController::class,'update_profil'] );
Route::POST('/update_pic_profil',[AdminController::class,'update_pic_profil'] );

Route::get('/statistiques',[StatistiquesController::class,'statistiques'] );


Auth::routes();
// Route::get('/admin_dashboard', 'Admin\DashboardController@index');
// Route::get('/user_dashboard', 'User\DashboardController@index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user_dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->middleware('role:user');
Route::get('/adminHome', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');

// Route::get('/admin_dashboard', 'Admin\DashboardController@index');
// Route::get('/user_dashboard', 'User\DashboardController@index');
Route::get('infoRes/{id_location}', [App\Http\Controllers\CarController::class,'info_res']);
Route::get('back', [App\Http\Controllers\CarController::class,'back']);
// Reclamations------------------

Route::get('/reclamation',[ReclamationController::class,'getReclamations'] );
Route::get('/reclamation/info/{id}',[ReclamationController::class,'getReclamationsinfo'] );

// -----------------------------------
// Messages------------------

Route::get('/message',[MessageController::class,'getMessages'] );
Route::get('/message/info/{id}',[MessageController::class,'getMessagesinfo'] );

// -----------------------------------



Route::get('/client',[ClientController::class,'getClients'] );
Route::get('/ProfilClient/{id}',[ClientController::class,'ProfilClient'] );

Route::get('DeleteClient/{id}',[ClientController::class,'deleteClient'] );
// Route::get('/agence', function () {
//     return view('admin.agence2');
// });
// Route::get('/voiture', function () {
//     return view('admin.voiture');
// });


Route::get('back_home',[CarController::class,'back_home'] );
Route::get('back_nos_agences',[CarController::class,'back_nos_agences'] );
Route::get('back_nos_voitures',[CarController::class,'back_nos_voitures'] );


Route::get('/blog1', function () {
         return view('blogs.blog1');
    });
    Route::get('/blog2', function () {
             return view('blogs.blog2');
         });
        Route::get('/blog3', function () {
        return view('blogs.blog3');
         });