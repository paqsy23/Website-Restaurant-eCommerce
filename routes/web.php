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

// Login Register
Route::get('login', 'LoginRegisterController@loginPage');
Route::get('register', 'LoginRegisterController@registerPage');
Route::post('login-process', 'LoginRegisterController@loginProcess');
Route::post('register-process', 'LoginRegisterController@registerProcess');

// Main Page
Route::get('', 'MainController@landing');
