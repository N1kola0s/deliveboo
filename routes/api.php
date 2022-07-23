<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::namespace('API')->group( function () {
    // rotta ristoranti
    Route::get('/restaurants', 'UserController@index');

    Route::get("restaurants/filter", "UserController@filteredUsers");

    // rotta tipologia ristoranti
    Route::get('/types', 'TypeController@index');

    // rotta menu ristorante
    Route::get('/{restaurant:slug}', 'UserController@show');
});


