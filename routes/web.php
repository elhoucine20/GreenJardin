<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\client\ClientPages;
use App\Http\Controllers\client\CommandeClientController;
use App\Http\Controllers\client\PaimentController;
// use App\Http\Controllers\client\CommandeController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\DashbordAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\visiteur\VisiteurController ;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// authentification
Route::get('/inscription', [registerController::class, 'index'])->name('inscrire');
Route::post('/login', [registerController::class, 'create'])->name('login');

Route::controller(LoginController::class)->group(function(){

    Route::get('/login','index')->name('login');
    Route::post('/dashbord-admin','create')->name('dashbord-admin');
    Route::post('/dashbord-client',  'create')->name('dashbord-client');
    Route::post('/logout','LogOut')->name('logout');
});

// admin
Route::controller()->middleware(AdminMiddleware::class)->group(function () {

    Route::resource('produits', ProduitController::class);
    Route::resource('categories', CategorieController::class);

    Route::get('/utilisateurs', [UserController::class, 'index'])->name('utilisateurs-admin');

    Route::put('/userBloquer/{id}',[UserController::class,'Bloquer'])->name('userBloquer');
    Route::put('/userDeBloquer/{id}',[UserController::class,'deBloquer'])->name('userDeBloquer');

    Route::get('/dashbord-admin', [LoginController::class, 'show'])->name('Dashbord-Admin');

    Route::get('adminDashbord',[DashbordAdminController::class,'index'])->name('dashbordAdmin');


    Route::resource('/commandesAdmin', CommandesController::class);
});


//client  
Route::controller()->middleware(ClientMiddleware::class)->group(function () {

    Route::controller(ClientController::class)->group(function(){

        Route::get('dashbord', 'index')->name('dashbord');
        Route::put('/Myfavori/{produit}', 'CreateFavorite')->name('AddToFavorites');
        Route::get('/favorites','lesFavorites')->name('favorites');
    });

    

    Route::controller(ClientPages::class)->group(function(){

        Route::get('produitss','produits')->name('produitss');
        Route::get('panier','paniers')->name('paniers');
        Route::get('checkout', 'checkout')->name('checkout');
        Route::get('favorites','favorites')->name('favorites');
        Route::get('commandess', 'commandes')->name('commandess');
        Route::get('paiment', 'paiments')->name('paiments');
    });

    // commandes
    Route::post('/commandes/{produit}',[CommandeClientController::class,'store'])->name('commande-ajouter');
    Route::put('/commandes/{id}',[CommandeClientController::class,'update'])->name('CommandeUpdated');
    
    // paiment
        Route::controller(PaimentController::class)->group(function(){

            Route::get('paiment/{commande}','index')->name('paiment');
            Route::post('payer','payer')->name('payer');
            Route::get('cancel','cancel')->name('cancel');
            Route::get('/stripe/success','stripeSuccess')->name('stripe.success');
        });


});

// visiteur
Route::get('visiteur',[VisiteurController::class,'index'])->name('visiteur');