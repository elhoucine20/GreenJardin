<?php

namespace App\Http\Controllers;

use App\Http\Services\Validate;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categorie::all();
        $totalCategories = $categories->count();
        return view('admin/category',compact('categories','totalCategories'));
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
        Validate::ValidateCategorie($request);
        Categorie::create([
                'name'=>$request->categorie_name,
                'icon'=>$request->emoji,
                'description'=>$request->description,
            ]);
            return redirect()->route('category-admin');
            // dd($request->post());
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        dd($request->post(),$id);
            Validate::ValidateCategorie($request);
        //     Categorie::findOrFail($id)->update([
        //    'name' => $request->categorie_name,
        //    'icon' => $request->emoji,
        //    'description' => $request->description,
        //    ]);

    return redirect()->route('category-admin');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
