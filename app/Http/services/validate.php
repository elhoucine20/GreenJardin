<?php
namespace App\Http\Services;


class Validate{

     public static function Valider($request){
      
      return $request->validate([
           'name' => 'required|string|between:3,30',
           'email' => 'required|string',
           'password' => 'required|string',
           'password2'=>'required|string'
       ]);
      }
}