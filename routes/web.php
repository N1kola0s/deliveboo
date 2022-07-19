<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

/* Home principale della dashboard */
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('products', 'ProductController')->parameters([
        'products' => 'product:slug'   //per mettere lo slug su product
    ]);
    Route::resource('orders', 'OrderController');
});



// come ultima rotta
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');

