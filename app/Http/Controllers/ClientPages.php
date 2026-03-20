<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientPages extends Controller
{
    //

    public function produits(){
        return view('client/produits');
    }

    public function commandes(){
        return view('client/commandes');
    }
    public function favorites(){
        return view('client/favori');
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
