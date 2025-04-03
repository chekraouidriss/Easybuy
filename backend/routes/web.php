<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Mail;
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

Route::get('/shop-single', function () {
    return view('shop-single');
});

Route::get('/sign_up', function () {
    return view('sign_up');
});

Route::get('/products', function () {
    return view('products');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/produits/{id}/modifier', [ProduitController::class, 'update'])->name('produits.modifier');
Route::delete('/produits/{id}/supprimer', [ProduitController::class, 'destroy'])->name('produits.supprimer');
Route::get('/produits', [ProduitController::class, 'index'])->name('products.index');
Route::post('/produits/store', [ProduitController::class, 'store'])->name('products.store');
Route::get('/products', [ProduitController::class, 'index'])->name('products.index');
Route::get('/admin', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
Route::resource('produits', ProduitController::class);
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::get('/panier/details', [PanierController::class, 'getPanierDetails']);
Route::post('/panier/ajouter', [PanierController::class, 'ajouterAuPanier'])->middleware('auth');
Route::delete('/panier/supprimer/{produit_id}', [PanierController::class, 'supprimerDuPanier'])->name('panier.supprimer');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/buy', [PaymentController::class, 'index'])->name('buy');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::post('/payment/confirm', [PaymentController::class, 'confirm'])->name('payment.confirm');
});
// Dans routes/web.php
Route::get('/test-email', function() {
    Mail::to('chekraouidriss1@gmail.com')->send(new \App\Mail\PaymentConfirmationMail('123456'));
    return "Email envoyé !";
});
Route::post('/payment/confirm', [PaymentController::class, 'confirm'])->name('payment.confirm');
Route::post('/payment/verify', [PaymentController::class, 'verifyCode'])->name('payment.verify');
Route::get('/payment/success', function() {
    return view('payment.success');
})->name('payment.success');
