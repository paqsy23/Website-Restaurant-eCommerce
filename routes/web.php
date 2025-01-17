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
Route::group(['prefix' => 'promos'], function () {
    Route::get('/', 'MainController@promos');
    Route::get('{page}', 'MainController@promos');
    Route::get('detail/{id}', 'MainController@promoDetail');
});
Route::group(['prefix' => 'main-dishes'], function () {
    Route::get('/', 'MainController@main_dishes');
    Route::get('{page}', 'MainController@main_dishes');
    Route::get('detail/{id}', 'MainController@menuDetail');
});
Route::group(['prefix' => 'desserts'], function () {
    Route::get('/', 'MainController@desserts');
    Route::get('{page}', 'MainController@desserts');
    Route::get('detail/{id}', 'MainController@menuDetail');
});
Route::group(['prefix' => 'drinks'], function () {
    Route::get('/', 'MainController@drinks');
    Route::get('{page}', 'MainController@drinks');
    Route::get('detail/{id}', 'MainController@menuDetail');
});
Route::get('search', 'MainController@search');
Route::get('filter/{nama}', 'MainController@filter');

// Cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@cart');
    Route::post('add', 'CartController@addToCart');
    Route::post('delete', 'CartController@deleteItem');
    Route::get('inc/{id}', 'CartController@increaseCart');
    Route::get('dec/{id}', 'CartController@decreaseCart');
});

// Transaction
Route::group(['prefix' => 'trans'], function () {
    Route::get('/', 'TransController@showHistory');
    Route::post('checkout', 'TransController@checkout');
    Route::post('action', 'TransController@action');
    Route::get('detail/{id}', 'TransController@showDetail');
});

// Address
Route::group(['prefix' => 'address'], function () {
    Route::get('/', 'AddressController@listAddresses');
    Route::get('set/{id}', 'AddressController@setActive');
    Route::get('show-form/{id}', 'AddressController@showForm');
    Route::post('edit/{id}', 'AddressController@editAddress');
});

// Admin Page
// Makanan
Route::get('admin', 'AdminController@adminLanding');
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

//Chat
Route::get('chat/{id}', 'ChatController@chat');
Route::get('chat', 'ChatController@chat');
Route::post('insertChat/{id}', 'ChatController@insertChat');
Route::get('chatAdmin/{id}', 'ChatController@chatAdmin');
Route::post('insertAdmin/{id}', 'ChatController@insertAdmin');
Route::get('load-chat', 'ChatController@showChat');

//faq
Route::get('faq', 'faqController@landing');
Route::post('submitReview', 'TransController@submitReview');

//Profile
Route::get('profile', 'ProfileController@landing');
Route::post('update-profile', 'ProfileController@updateProfile');
Route::post('update-password', 'ProfileController@updatePassword');
