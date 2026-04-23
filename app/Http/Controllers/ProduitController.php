<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produit\StoreProduitRequest;
use App\Http\Requests\Produit\UpdateProduitRequest;
use App\Http\Services\Validate;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    public function index()
    {
        //
        $categories = Categorie::all();
        $produits = Produit::paginate(4);
        return view('admin/produits-admin', compact('categories', 'produits'));
    }

    public function store(StoreProduitRequest $request)
    {
        //
        $image = null;
        $data = $request->validated();
        if ($request->hasFile('image')) {
            # code...
            $data['image'] = $request->file('image')->store('photos', 'public');
        }
        Produit::create($data);
        return redirect()->route('produits.index')->with('succes','produit created avec succes');
    }

    public function update(UpdateProduitRequest $request, $id)
    {
        //
        $produit = Produit::findOrFail($id);
        $produit->update($request->validated());
        return redirect()->route('produits.index')->with('succes','produit updated avec succes');
    }


    public function destroy($id)
    {
        //
        Produit::destroy($id);
        return redirect()->route('produits.index')->with('delete','produit deleted avec succes');
    }
}
