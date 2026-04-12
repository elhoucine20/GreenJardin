<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Paiment;
use Illuminate\Http\Request;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return view('admin/commandes');
        $paimentes = Paiment::with('commande')->get();
        // dd($commandes);
        $countPaye = Paiment::where('status','paye')->count();
        $countPendding = Paiment::where('status','en_attente')->count();
        $countAnnuler = Paiment::where('status','annuler')->count();
        return view('admin/commandes',compact('paimentes','countPaye','countPendding','countAnnuler'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd('id de paiment',$id);
        // dd($request->post(),$id);
        $paiment = Paiment::findOrFail($id);
        $paiment->update([
            'status'=>$request->statu,              
            ]);
            return to_route('commandesAdmin.index')->with('success','status updated avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $paiment = Paiment::findOrFail($id);
          $paiment->delete();

        // Paiment::destroy($id);
        return to_route('commandesAdmin.index')->with('deleted','commande delete avec succes');
        dd("are you sure to dzlzt this xommande  ",$id);
    }
}
