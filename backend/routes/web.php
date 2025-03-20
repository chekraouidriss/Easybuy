<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Routes pour l'authentification
Route::get('/log_in', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/shop/search', [AuthController::class, 'search'])->name('shop.search');

// Route protégée pour la page shop
Route::get('/shop', [AuthController::class, 'shop'])->middleware('auth')->name('shop');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
Route::get('/shop-single', function () {
    return view('shop-single');
});

Route::get('/sign_up', function () {
    return view('sign_up');
});