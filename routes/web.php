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
})->middleware(['auth']);

// Phones
Route::resource('phones', 'PhoneController');
Route::get('/phones/{filters}/fetch', 'PhoneController@fetch')->name('phones.fetch');

// Terms
Route::get('/terms/{phone}/delivery', 'TermController@delivery')->name('term.delivery');
Route::get('/terms/{phone}/refund', 'TermController@refund')->name('term.refund');

// Contacts
Route::get('/', 'ContactController@index')->name('contacts.index');
Route::get('/contacts/{filter}/fetch', 'ContactController@fetch')->name('contacts.fetch');
Route::get('/contacts/{user}', 'ContactController@show')->name('contacts.show');

// Login Routes
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login/{provider}', 'Auth\SocialAccountController@redirectToProvider')->name('socialite.login');
Route::get('/auth/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback')->name('socialite.callback');
