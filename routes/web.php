<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\registerController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});






// authentification
// Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/inscription', [registerController::class, 'index'])->name('inscrire');
Route::post('/login', [registerController::class, 'create'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'create'])->name('login');


// admin
Route::controller(ProduitController::class)->middleware(AdminMiddleware::class)->group(function(){

    Route::get('/dashbord-admin', 'index')->name('dashbord-admin');

});

// client
// Route::controller(ClientController::class)->middleware(ClientMiddleware::class)->group(function(){
//     Route::get('/dashbord',"index")->name('dashbord');

// });


