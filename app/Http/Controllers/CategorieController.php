<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categorie\StoreCategorieRequest;
use App\Http\Requests\Categorie\UpdateCategorieRequest;
use App\Http\Services\Validate;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index()
    {
        //
        $categories = Categorie::paginate(3);
        $totalCategories = $categories->count();
        return view('admin/category',compact('categories','totalCategories'));
    }

    public function store(StoreCategorieRequest $request)
    {
        //
        // Validate::ValidateCategorie($request);
        Categorie::create([
                'name'=>$request->categorie_name,
                'icon'=>$request->emoji,
                'description'=>$request->description,
            ]);
            // dd($request->post());
            return redirect()->route('categories.index')->with('succes','categorie created avec succes');
    }

    public function update(UpdateCategorieRequest $request, $id)
    {
        //
        // Validate::ValidateCategorie($request);   
        $categorie = Categorie::findOrFail($id);
        $categorie->update([
            'name' => $request->categorie_name,
            'icon' => $request->emoji,
            'description' => $request->description,
            ]);
            
            // dd($request->post(),$id);
    return redirect()->route('categories.index')->with('succes','categorie updated avec succes');

    }

    public function destroy($id)
    {
        // dd($categorie);
        Categorie::destroy($id);
        return redirect()->route('categories.index')->with('delete','categorie deleted avec succes');
    }
}
