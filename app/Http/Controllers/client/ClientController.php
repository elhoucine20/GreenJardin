<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Favorite;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits = Produit::all();
        $categories = Categorie::all();
        
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        // view('components/CardProduits',compact('produits','categories','favorites'));

        return view('client/client-dashbord',compact('produits','categories','favorites'));
    }

    public function CreateFavorite(Produit $produit){

      /**
       * @var App\Models\User $user
       */
        $user = Auth::user();
        $user->favorite()->toggle($produit->id);

        return $this->lesFavorites();
    }

     public function lesFavorites(){
        
         $favorites = Favorite::where('user_id', Auth::user()->id)->get();
               return view('client/favori', compact('favorites'));
     }

    public function destroy(Favorite $favorite)
    {
      Favorite::where('produit_id',$favorite->produit->id)->delete($favorite->id);
      return $this->index();
    }
}
