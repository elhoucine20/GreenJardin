<?php

namespace App\Http\Controllers\visiteur;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Produit;

class VisiteurController extends Controller{


   public function index(){
    $categories = Categorie::all();
    $produits = Produit::all();
    return view('visiteur/visiteur',compact('categories','produits'));
    // return view('welcome',compact('categories','produits'));
   }
}