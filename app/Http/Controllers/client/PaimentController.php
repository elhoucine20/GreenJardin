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


    public function payer(Request $request)
    {

        // method de cash
        if ($request->methode == 'cash') {
            $commande = Commande::findOrFail($request->commande_id);
            # code...
            Paiment::create([
                'commande_id' => $request->commande_id,
                'status' => 'en_attente',
                'methode'     => 'cash',
                'montant'     => $commande->total,

            ]);
            $commande->update(['status' => 'en_cash']);
            return to_route('checkout')->with('success', 'paiment a la laivraison confirmer');
        } else if ($request->methode == 'stripe') {
            # code...
            // find commande 
            $commande = Commande::findOrFail($request->commande_id);

        // connecter avec stripe par secret key
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // creation de session en stripe 
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $commande->produit->name,
                        ],
                        'unit_amount'  => $commande->total * 100, // stripe va calculer en cents
                    ],
                    'quantity' => $commande->quantity,
                ]],
                'mode'        => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}&commande_id=' . $commande->id,
                'cancel_url'  => route('checkout'), //if user cancelled
            ]);

            // redirect vers page de stripe pour paye
            return redirect($session->url);
        }

        // if exist un error
        return back()->with('error', 'Methode invalide.');
    }

 
    // sripe redirect user vers cette page automatiquement avec commande_id 
    public function stripeSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // status de paiment de stripe
        $session  = \Stripe\Checkout\Session::retrieve($request->session_id);
        $commande = Commande::findOrFail($request->commande_id);

        // if paid save en DB
        if ($session->payment_status == 'paid') {
            Paiment::create([
                'commande_id' => $commande->id,
                'status'      => 'paye',
                'methode'     => 'stripe',
                'montant'     => $commande->total,
            ]);

            $commande->update(['status' => 'paid']);
            
            // redirect page principale avec message de succes
            return to_route('checkout')->with('success', 'Paiement Stripe reussi !');
        }

        return to_route('checkout')->with('error', 'Paiement echoue.');
    }
}
