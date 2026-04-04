<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Commande;
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

      //    return view('components/CardProduits',compact('produits','categories','favorites'));
        return view('client/produits',compact('produits','categories','favorites'));
    }

    public function commandes(){
        $penddings = Commande::where('status','=','pendding')->where('user_id','=',Auth::user()->id)->get();
        $paids = Commande::where('status','=','paid')->where('user_id','=',Auth::user()->id)->get();
        // $cancelleds = Commande::where('status','=','cancelled')->where('user_id','=',Auth::user()->id)->get();
        return view('client/commandes',compact('penddings','paids'));
    }

    
    public function favorites(){
                 $favorites = Favorite::where('user_id', Auth::user()->id)->get();
               return view('client/favori', compact('favorites'));
    }

    public function checkout(){
        $commandes = Commande::where('status','=','pendding')->where('user_id','=',Auth::user()->id)->get();
         $total = $commandes->sum('total');
         $user = Auth()->user();
        return view('client/Checkout',compact('commandes','total','user'));
    }

    public function paniers(){
        
        return view('client/Panier');
    }
    
    public function paiments(){
        return view('client/Paiment');
    }
}
