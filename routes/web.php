<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionHeaderController;
use App\Http\Controllers\TransactionDetailController;
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

Route::get('/', function () {
  return view('welcome');
});

// User Controller
Route::get('/sign-in', [UserController::class, 'viewSignIn'])->middleware('logout');

Route::post('/sign-in', [UserController::class, 'signIn'])->middleware('logout');

Route::get('/sign-up', [UserController::class, 'viewSignUp'])->middleware('logout');

Route::post('/sign-up', [UserController::class, 'signUp'])->middleware('logout');

Route::get('/sign-out', [UserController::class, 'signOut'])->middleware('login');

Route::get('/profile', [UserController::class, 'viewProfile'])->middleware('login');

Route::get('/edit-profile', [UserController::class, 'viewEditProfile'])->middleware('member');

Route::patch('/edit-profile', [UserController::class, 'editProfile'])->middleware('member');

Route::get('/edit-password', [UserController::class, 'viewEditPassword'])->middleware('login');

Route::patch('/edit-password', [UserController::class, 'editPassword'])->middleware('login');

// Item Controller
Route::get('/home', [ItemController::class, 'viewHome'])->middleware('login')->middleware('login');

Route::get('/search', [ItemController::class, 'viewSearch'])->middleware('login');

Route::get('/view/search', [ItemController::class, 'viewPageSearch'])->middleware('login');

Route::get('/detail/{id}', [ItemController::class, 'viewDetail'])->middleware('login');

Route::delete('/delete-item/{id}', [ItemController::class, 'deleteItem'])->middleware('admin');

// Transaction Detail Controller
Route::post('/detail/{id}', [TransactionDetailController::class, 'addItem'])->middleware('member');

// Transaction Header Controller
Route::get('/view-cart', [TransactionHeaderController::class, 'viewCart'])->middleware('member');

Route::post('/checkout', [TransactionHeaderController::class, 'checkout'])->middleware('member');

Route::get('/history', [TransactionHeaderController::class, 'viewHistory'])->middleware('member');

Route::get('/edit-cart', [TransactionDetailController::class, 'editCart'])->middleware('member');

Route::delete('/remove/{id}', [TransactionDetailController::class, 'remove'])->middleware('member');
