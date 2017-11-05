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

Route::get("/","dashboard@index");

Route::get("/users","UserController@index");
Route::get("/users/{id}","UserController@user_profile");

Route::get("/activities","Activities@index");
Route::get("/notifications","NotificationController@index");

// route to show the login form
Route::get('login','Controller@showLogin');

// route to logout
Route::get('logout','dashboard@logout');

// route to process the form
Route::post('login','Controller@doLogin');
