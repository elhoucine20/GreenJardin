<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Paiment;
use Illuminate\Http\Request;

class PaimentController extends Controller
{
    //


    public function index($commandeId)
    {
        $commande = Commande::with('produit')->findOrFail($commandeId);
        return view('paiment', compact('commande'));
    }


    public function payer(Request $request){
        
        // method de cash
        if ($request->methode=='cash') {
            # code...
            Paiment::create([
                'commande_id'=>$request->commande_id,
                'status'=>'en_attente',
            ]);
            return to_route('commandes')->with('success','paiment a la laivraison confirmer');
        }
        
    }

    
}
