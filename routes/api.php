<?php

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

use Illuminate\Support\Facades\Route;

Route::get('health', 'HealthController@index');

Route::group(['prefix' => 'apartments'], function() {
    Route::get('', 'Apartment\ApartmentController@index');
    Route::get('/{id}', 'Apartment\ApartmentController@show');
    Route::post('', 'Apartment\ApartmentController@create');
    Route::put('/{id}', 'Apartment\ApartmentController@update');
});

Route::group(['prefix' => 'apartment-categories'], function() {
    Route::get('', 'ApartmentCategory\ApartmentCategoryController@index');
    Route::get('/{id}', 'ApartmentCategory\ApartmentCategoryController@show');
    Route::post('', 'ApartmentCategory\ApartmentCategoryController@create');
    Route::put('/{id}', 'ApartmentCategory\ApartmentCategoryController@update');
});
