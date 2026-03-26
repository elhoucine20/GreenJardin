<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Favorite;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientPages extends Controller
{
    //

    public function produits(){
        $produits = Produit::all();
        $categories = Categorie::all();
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();

        return view('client/produits',compact('produits','categories','favorites'));
    }

    public function commandes(){
        return view('client/commandes');
    }
    public function favorites(){
                 $favorites = Favorite::where('user_id', Auth::user()->id)->get();
               return view('client/favori', compact('favorites'));
        // return view('client/favori');
    }
    public function checkout(){
        return view('client/Checkout');
    }

    public function paniers(){
        return view('client/Panier');
    }
    public function paiments(){
        return view('client/Paiment');
    }
}
