<?php

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

//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
	Route::resource('restaurants', 'backend\RestaurantController');
	Route::resource('restaurant-users', 'backend\RestaurantUserController');
	Route::resource('branch-offices', 'backend\BranchOfficeController');
	Route::resource('food-types', 'backend\FoodTypeController');
	Route::resource('foods', 'backend\FoodController');
});