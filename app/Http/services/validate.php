<?php
namespace App\Http\Services;


class Validate{

    // validation de user
     public static function Valider($request){
      return $request->validate([
           'name' => 'required|string|between:3,30',
           'email' => 'required|string',
           'password' => 'required|string',
           'password2'=>'required|string'
       ]);
      }
    //   validation de categorie 
      public static function ValidateCategorie($request){
        return $request->validate([
            'categorie_name'=>'required|string|between:3,30',
            'emoji'=>'required|string',
            'description'=>'required|string|between:10,150',
        ]);
    }
    // validate for produits
    public static function validateProduit($request){
    return $request->validate([
            'name' => 'required|string|between:3,30',
            'prix' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'categorie_id' => 'required|integer',
            'image' => 'nullable|image',
            // 'image' => 'nullable|image|mimes:png,jpg,gif,|max:2048',
    ]);
    }
}