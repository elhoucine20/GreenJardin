<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Paiment;
use Illuminate\Http\Request;

class PaimentController extends Controller
{
    //
    public function payer(Request $request){
        // if ($request->methode=='cash') {
        //     # code...
        //     Paiment::create([
        //         'commande_id'=>$request->commande_id,
        //         'methode'=>$request->methode,
        //         'commande_id'=>$request->commande_id,
        //         'commande_id'=>$request->commande_id,
        //     ])
        // }
    }
}
