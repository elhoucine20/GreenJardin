<?php

namespace App\Http\Controllers;

use App\Http\Requests\Commande\UpdateCommandeRequest;
use App\Models\Commande;
use App\Models\Paiment;
use Illuminate\Http\Request;

class CommandesController extends Controller
{

    public function index()
    {
        //
        $paimentes = Paiment::with('commande')->paginate(3);
        // dd($commandes);
        $countPaye = Paiment::where('status','paye')->count();
        $countPendding = Paiment::where('status','en_attente')->count();
        $countAnnuler = Paiment::where('status','annuler')->count();
        return view('admin/commandes',compact('paimentes','countPaye','countPendding','countAnnuler'));

    }

    public function update(UpdateCommandeRequest $request, string $id)
    {

        // dd($request->post(),$id);
        $paiment = Paiment::findOrFail($id);
        $paiment->update($request->validated());
            return to_route('commandesAdmin.index')->with('success','status updated avec success');
    }


    public function destroy(string $id)
    {
        //
         $paiment = Paiment::findOrFail($id);
          $paiment->delete();

        // dd("are you sure to dzlzt this xommande  ",$id);
        return to_route('commandesAdmin.index')->with('deleted','commande delete avec succes');
    }
}
