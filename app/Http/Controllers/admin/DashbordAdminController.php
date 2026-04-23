<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Paiment;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class DashbordAdminController extends Controller
{
    //
    public function index(){

       $produitsActif = Produit::where('stock','>',0)->count();
       $chiffreDaffiare = Paiment::where('status','paye')->sum('montant');
       $countUsers = User::all()->count();
       $countAdmins = User::where('role','admin')->count();
       $countClients = User::where('role','client')->count();
       $categories = Categorie::all();
       $countCommande =Paiment::all()->count();

       return view('admin/admin-dashbord',compact('produitsActif','chiffreDaffiare','countUsers','countAdmins','countClients','categories','countCommande'));
    }
}
