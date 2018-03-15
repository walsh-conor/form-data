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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::post('/submit', 'UserController@store');


// Wildcard Routes
Route::get('/{route}', function ($route) {
    return view($route);
});

Auth::routes();
