<?php

use App\Http\Controllers\ItemController;
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

Route::get('/', function () {
    return view('view_cart');
});

// To Change
Route::get('/welcome', function () {
  return view('welcome');
});

Route::get('/sign_in', function () {
  return view('sign_in');
});

Route::get('/sign_up', function () {
  return view('sign_up');
});

Route::get('/home', [ItemController::class, 'viewHome']);
