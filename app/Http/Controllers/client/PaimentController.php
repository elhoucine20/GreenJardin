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
            $commande = Commande::findOrFail($request->commande_id);
            # code...
            Paiment::create([
                'commande_id'=>$request->commande_id,
                'status'=>'en_attente',
                'methode'     => 'cash',    
                'montant'     => $commande->total,

            ]);
            $commande->update(['status' => 'paid']);
            return to_route('checkout')->with('success','paiment a la laivraison confirmer');
        }
        return back()->with('error', 'Methode invalide.');
        
    }

}
