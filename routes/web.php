<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/view-cart', [TransactionHeaderController::class, 'viewCart']);
Route::get('/view-cart', function () {
    return view('view_cart');
})->middleware('login');

// To Change
Route::get('/', function () {
  return view('welcome');
});

Route::get('/sign-in', function () {
  return view('sign_in');
});

Route::post('/sign-in', [UserController::class, 'signIn']);

Route::get('/sign-up', function () {
  return view('sign_up');
});

Route::post('/sign-up', [UserController::class, 'signUp']);

Route::get('/home', [ItemController::class, 'viewHome']);
