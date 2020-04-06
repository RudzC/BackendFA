<?php

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

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');

//protected routes
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::get('/trades', 'TradeController@index');
Route::get('/trade/{id}', 'TradeController@show');
Route::post('/trade/{id}', 'TradeController@update');
Route::post('/trade', 'TradeController@store');
Route::delete('/trade/{id}', 'TradeController@destroy');

Route::get('/categories', 'CategoryController@index');
Route::get('/category/{id}', 'CategoryController@show');
Route::post('/category/{id}', 'CategoryController@update');
Route::post('/category', 'CategoryController@store');
Route::delete('/category/{id}', 'CategoryController@destroy');

Route::get('/currencies', 'CurrencyController@index');
Route::get('/currency/{id}', 'CurrencyController@show');
Route::post('/currency/{id}', 'CurrencyController@update');
Route::post('/currency', 'CurrencyController@store');
Route::delete('/currency/{id}', 'CurrencyController@destroy');

Route::get('/transactions', 'TransactionController@index');
Route::get('/transaction/{id}', 'TransactionController@show');
Route::post('/transaction/{id}', 'TransactionController@update');
Route::post('/transaction', 'TransactionController@store');
Route::delete('/transaction/{id}', 'TransactionController@destroy');