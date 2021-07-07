<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategoriesController;
use App\Models\Categorie;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function afficheA(){
        $ListeCategories = Categorie::all();
        return view('pages.Nos_voitures',['categories' => $ListeCategories]);
    }








}
