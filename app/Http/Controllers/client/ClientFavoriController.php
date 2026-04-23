<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Favorite;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientFavoriController extends Controller
{

    public function CreateFavorite(Produit $produit){

      /**
       * @var App\Models\User $user
       */
        $user = Auth::user();
        $user->favorite()->toggle($produit->id);

        return to_route('favorites');
    }
}
