<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionHeaderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/view-cart', [TransactionHeaderController::class, 'viewCart']);

// To Change
Route::get('/', function () {
  return view('welcome');
});

Route::get('/sign-in', function () {
  return view('sign_in');
})->middleware('logout');

Route::post('/sign-in', [UserController::class, 'signIn']);

Route::get('/sign-up', function () {
  return view('sign_up');
})->middleware('logout');

Route::post('/sign-up', [UserController::class, 'signUp']);

Route::get('/sign-out', [UserController::class, 'signOut']);

Route::get('/home', [ItemController::class, 'viewHome'])->middleware('login');
