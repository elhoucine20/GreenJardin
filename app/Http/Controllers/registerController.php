<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Validate;
use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
  
    public function index()
    {
        //
        return view('auth/register');
    }

    public function create(RegisterRequest $request)
    {
        //
        if ($request) {
            # code...
            $pass1 = $request->password;
            $pass2 = $request->password2;
            if ($pass1==$pass2) {
                # code...
                Validate::Valider($request);
                User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'role'=>'client',
                ]);

                return view('auth/login');
            }else{
                return back()->with("confirmer your password");
            }
        }else{
            return view('auth/register');
        }
    }
}
