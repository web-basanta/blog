<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ProductController;

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
    //return view('welcome');
    return view('home.home');
});
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});
 Route::middleware(['authuser'])->group(function(){
    Route::resource('products', ProductController::class);
    Route::controller(LoginRegisterController::class)->group(function() {
  //  Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::post('/create', 'create')->name('auth.create');
    //Route::get('/login', 'login')->name('login');
    // Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
 });



// Route::controller(ProductController::class)->group(function() {
//     Route::post('/create', 'create')->name('create');
// });