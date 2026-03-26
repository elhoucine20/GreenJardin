<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\client\ClientPages;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// authentification
Route::get('/inscription', [registerController::class, 'index'])->name('inscrire');
Route::post('/login', [registerController::class, 'create'])->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/dashbord-admin', [LoginController::class, 'create'])->name('dashbord-admin');
Route::post('/dashbord-client', [LoginController::class, 'create'])->name('dashbord-client');
Route::post('/logout', [LoginController::class, 'LogOut'])->name('logout');





// admin
Route::controller()->middleware(AdminMiddleware::class)->group(function () {

    Route::resource('produits', ProduitController::class);
    Route::resource('categories', CategorieController::class);

    Route::get('/utilisateurs', [UserController::class, 'index'])->name('utilisateurs-admin');
    Route::get('/dashbord-admin', [LoginController::class, 'show'])->name('Dashbord-Admin');


    Route::resource('/commandes', CommandesController::class);
});


//client  
Route::controller()->middleware(ClientMiddleware::class)->group(function () {
    Route::get('dashbord', [ClientController::class, 'index'])->name('dashbord');
    Route::get('produitss', [ClientPages::class, 'produits'])->name('produitss');
    Route::get('commandess', [ClientPages::class, 'commandes'])->name('commandess');
    Route::get('favorites', [ClientPages::class, 'favorites'])->name('favorites');
    Route::get('paiment', [ClientPages::class, 'paiments'])->name('paiments');
    Route::get('panier', [ClientPages::class, 'paniers'])->name('paniers');
    Route::get('checkout', [ClientPages::class, 'checkout'])->name('checkout');
    Route::put('/Myfavori/{produit}',[ClientController::class, 'CreateFavorite'])->name('AddToFavorites');
    Route::get('/favorites',[ClientController::class, 'lesFavorites'])->name('favorites');
    
});

    // Route::delete('/DeleteFavorite/{favorite}',"destroy")->name('DeleteFavorite');

                    //  @php
                    //     $Favorite = $favorites->contains('produit_id', $produit->id);
                    //    @endphp