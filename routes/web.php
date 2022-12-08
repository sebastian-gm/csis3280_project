<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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
    return view('home');
});



Route::get('/dashboard','App\Http\Controllers\DashboardController@list')->name('dashboard');

Route::get('/transactions', 'App\Http\Controllers\TransactionController@list')->name('transactions');

Route::get('/transaction/add', 'App\Http\Controllers\TransactionController@add')->name('add_transaction');

Route::post('/transaction/create', 'App\Http\Controllers\TransactionController@create')->name('transaction.create');

Route::get('/account/add', 'App\Http\Controllers\AccountController@add')->name('add_account');

Route::post('/account/create', 'App\Http\Controllers\AccountController@create')->name('account.create');

Route::get('/transaction/{id}/delete','App\Http\Controllers\TransactionController@delete')->name('transaction.delete');

Route::get('/transaction/{id}/edit',[TransactionController::class,'edit'])->name('transaction.edit');

Route::post('/transaction/{id}/update',[TransactionController::class,'update'])->name('transaction.update');

Route::get('/admin', 'App\Http\Controllers\UserController@type')->name('admin');

Route::get('/admin/{id}/delete','App\Http\Controllers\UserController@delete')->name('user.delete');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


