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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("auth")->group(function () {
    Route::get("init", "App\\Http\\Controllers\\AuthController@init");
    Route::post("login", "App\\Http\\Controllers\\AuthController@login");
    Route::post("register", "App\\Http\\Controllers\\AuthController@register");
});

Route::prefix("users")->group(function () {
    Route::get("get-users", "App\\Http\\Controllers\\UsersController@getUsers");
    Route::get("get-user/{id}", "App\\Http\\Controllers\\UsersController@getUser");
    Route::post("change-permissions", "App\\Http\\Controllers\\UsersController@changePermissions");
});
