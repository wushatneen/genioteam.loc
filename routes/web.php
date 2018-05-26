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

Route::get('/', 'ContactsController@getContacts');
Route::get('/create', function(){return view('create');});
Route::post('/create/insert', 'ContactsController@insertContact');
Route::get('/edit/{contactId}', 'ContactsController@getContact');
Route::post('/update/{contactId}', 'ContactsController@updateContact');
Route::get('/delete/{contactId}', 'ContactsController@deleteContact');
