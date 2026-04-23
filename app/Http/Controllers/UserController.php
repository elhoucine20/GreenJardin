<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        //
        $users = User::paginate(4);
        $countUsers = User::count();
        $usersActif = User::where('statu','active')->count();
        $countAdmins = User::where('role', 'admin')->count();
        $countClients = User::where('role', 'client')->count();
        return view('admin/utilisateurs', compact('users', 'countUsers', 'countAdmins', 'countClients','usersActif'));
    }

    // deBloquer   
    public function deBloquer(string $id)
    {
        //
        $user = User::findOrFail($id);
        if (Auth::user()->role !== 'admin')
        {
           return to_route('utilisateurs-admin')->with('error','pas possible de bloquer');
        }

        $user->update(['statu' => 'active']);
        return to_route('utilisateurs-admin')->with('succes','user est deBloquer avec succes');
    }

    // bloquer
    public function Bloquer($id)
    {
        //
        $user = User::findOrFail($id);
        if (Auth::user()->role !== 'admin')
        {
           return to_route('utilisateurs-admin')->with('error','pas possible de bloquer');
        }
        if($user->email === 'elhoucinenaitbrahim@gmail.com')
        { 
            return to_route('utilisateurs-admin')->with('error','pas possible de bloquer admin');
        }


        $user->update(['statu' => 'desActive']);
        return to_route('utilisateurs-admin')->with('succes','user bloquer avec succes');
  
    }
    
}
