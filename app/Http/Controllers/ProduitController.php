<?php

namespace App\Http\Controllers;

use App\Http\Services\Validate;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('admin/produits-admin',compact('categories','produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('admin/create-produit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $image = null;
        Validate::validateProduit($request);
        $data = $request->all();
        if ($request->hasFile('image')) {
            # code...
            $data['image'] = $request->file('image')->store('photos','public');
            }
            Produit::create($data);
            return redirect()->route('produits-admin');
            // dd($request->post(), $image );
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->post(),$id);
        $produit = Produit::findOrFail($id);
        $produit->update([
            'name'=>$request->name,
            'prix'=>$request->prix,
            'description'=>$request->description,
            'stock'=>$request->stock,
            'categorie_id'=>$request->categorie_id,
        ]);
        return redirect()->route('produits-admin');
        }
        
        /**
         * Remove the specified resource from storage.
        */
        public function destroy($id)
        {
            //
            Produit::destroy($id);
            return redirect()->route('produits-admin');
    }

}
