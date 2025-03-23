<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;



// Routes pour l'authentification
Route::get('/log_in', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/shop/search', [AuthController::class, 'search'])->name('shop.search');

// Route protégée pour la page shop
Route::get('/shop', [AuthController::class, 'shop'])->middleware('auth')->name('shop');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/buy', function () {
    return view('buy');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/panier', function () {
    return view('panier');
});
// Route pour afficher les détails d'un produit
Route::get('/shop-single/{id}', [ProduitController::class, 'showw'])->name('shop.single');

Route::get('/sign_up', function () {
    return view('sign_up');
});
Route::get('/admin', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
Route::resource('produits', ProduitController::class);
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::get('/panier/details', [PanierController::class, 'getPanierDetails']);
