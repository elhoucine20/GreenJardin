<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        //
        return view('auth/login');
    }

    public function create(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email, 'password' => $password, 'statu' => 'active'];

        if (Auth::attempt($credentials)) {
            # code...
            if (Auth::user()->role == "admin") {
                # code...
                $request->session()->regenerate();
                return to_route('dashbordAdmin');
            } else if (Auth::user()->role == "client") {
                $request->session()->regenerate();
                return to_route('dashbord');
            } else {
                # code...
                // $request->session()->regenerate();
                return view('auth/login');
            }
        } else {
            return to_route('login')->with('error', 'your account introvable ');
        }
    }

    public function show()
    {
        //
        $categories = Categorie::all();
        return  view('admin/admin-dashbord', compact('categories'));
    }

    public function LogOut()
    {
        Auth::logout();
        return view('auth/login');
    }
}
