<?php

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

Route::get('/', 'PageController@index')->name('home');
Route::get('/home{_dynamics?}', 'PageController@index')->name('login');

Route::get('/catalog{_dynamics?}', 'PageController@catalog')->name('catalog');

Route::get('/product/{productId}', 'PageController@product')->name('product');
Route::get('/product{_dynamics?}/{productId}', 'PageController@product')->name('product');


Route::middleware(['guest'])->group(function () {
    Route::post('/login', 'AuthController@login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile{_dynamics?}', 'PageController@profile')->name('profile');

    Route::post('/consultation', 'ConsultationController@consultation');
    Route::post('/consultation-phone', 'ConsultationController@consultationPhone');

    Route::get('/basket{_dynamics?}', 'PageController@basket')->name('basket');
    Route::post('/add-item-basket', 'BasketController@add');

    Route::post('/delete-item-basket/{basket_id}', 'BasketController@delete');
});
