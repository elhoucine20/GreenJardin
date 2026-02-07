<?php

namespace App\Http\Controllers;

use App\Http\Services\Validate;
use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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

                return view('login');
            }else{
                return back()->with("confirmer password");
            }
        }else{
            return view('register');
        }
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
