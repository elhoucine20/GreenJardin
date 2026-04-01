<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeClientController extends Controller
{


    public function index()
    {

        $commandes = Commande::all();
        return view('client/commandes');
    }


    public function store(Request $request) 
    {
        Commande::create([
            'user_id'=>Auth::user()->id,
            'produit_id'=>$request->produit_id,
            'prix'=>$request->prix,
            'total'=>$request->prix
        ]);
        return to_route('commandess');
        // dd($request->post());

    }
}
