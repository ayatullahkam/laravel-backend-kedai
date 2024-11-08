<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

// Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');



// Route::get('/dashboard', function () {
//     return view('pages.dashboard', ['type_menu' => 'dashboard']);

// });

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

     // Rute untuk admin
     Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
    });

    //Rute untuk staf dengan prefix 'staff'
    Route::middleware(['role:staf'])->prefix('staf')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('staf.user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('staf.user.create');
        Route::post('user', [UserController::class, 'store'])->name('staf.user.store');
    });

    Route::resource('product',ProductController::class);
    Route::resource('profil',ProfilController::class);
});
