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

    public function index($commandeId)
    {
        $commande = Commande::with('produit')->findOrFail($commandeId);
        return view('paiment', compact('commande'));
    }

    public function store(Request $request)
    {
        Commande::create([
            'user_id' => Auth::user()->id,
            'produit_id' => $request->produit_id,
            'prix' => $request->prix,
            'total' => $request->prix
        ]);
        return to_route('checkout');
        // dd($request->post());

    }


    public function update(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);

        if ($request->action === 'increase') {
            $commande->quantity += 1;
        }

        if ($request->action === 'decrease' && $commande->quantity > 1) {
            $commande->quantity -= 1;
        }

        // total
        $commande->total = $commande->prix * $commande->quantity;
        $commande->save();

            // ← hadi hiya l fix
            //  if ($request->expectsJson()) {
            //      return response()->json([
            //          'quantity' => $commande->quantity,
            //          'total'    => $commande->total,
            //      ]);
            //  }

        return response()->json([
            'quantity' => $commande->quantity,
            'total' => $commande->total
        ]);

        // return to_route('checkout')->with('success', 'Quantity updated');
    }
}
