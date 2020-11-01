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
Route::get('logout', 'LoginRegisterController@logout');

// Main Page
Route::get('/', 'MainController@landing');

// Makanan
Route::get('page_insertMakanan', 'AdminController@page_insertMakanan');
Route::get('page_updateMakanan', 'AdminController@page_updateMakanan');
Route::get('page_deleteMakanan', 'AdminController@page_deleteMakanan');
Route::post('insertMakanan', 'AdminController@insertMakanan');
Route::get('page_listMakanan', 'AdminController@page_listMakanan');
Route::get('/AdminController/editMakanan/{id}', 'AdminController@editMakanan');
Route::post('updateMakanan/{id}', 'AdminController@updateMakanan');
Route::delete('deleteMakanan/{id}', 'AdminController@deleteMakanan');

// Kategori
Route::get('page_insertKategori', 'AdminController@page_insertKategori');
Route::get('page_updateKategori', 'AdminController@page_updateKategori');
Route::get('page_listKategori', 'AdminController@page_listKategori');
Route::get('/AdminController/edit/{id}', 'AdminController@edit');
Route::post('insertKategori', 'AdminController@insertKategori');
Route::post('updateKategori/{id}', 'AdminController@updateKategori');
Route::delete('deleteKategori/{id}', 'AdminController@deleteKategori');

// Promo
Route::get('page_insertPromo', 'AdminController@page_insertPromo');
Route::post('insertPromo', 'AdminController@insertPromo');
Route::get('page_listPromo', 'AdminController@page_listPromo');
Route::get('page_updatePromo', 'AdminController@page_updatePromo');
Route::get('/AdminController/editPromo/{id}', 'AdminController@editPromo');
Route::post('updatePromo/{id}', 'AdminController@updatePromo');
Route::delete('deletePromo/{id}', 'AdminController@deletePromo');
