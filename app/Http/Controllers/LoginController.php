<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email'=> $email, 'password'=>$password];
        Auth::attempt($credentials);
        if (Auth::attempt($credentials)) {
            # code...
            if (Auth::user()->role=="admin") {
                # code...
                $request->session()->regenerate();
                return to_route('dashbord-admin');
            }else {
                # code...
                // $request->session()->regenerate();
                return view('login');
            }
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
