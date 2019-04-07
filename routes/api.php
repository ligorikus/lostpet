<?php

use Illuminate\Http\Request;

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

Route::post('image', 'ImageController@upload')->name('images.upload');

Route::get('notes', 'NoteController@index')->name('notes.list');
Route::get('notes/{note}', 'NoteController@view')->name('notes.view');
Route::post('notes', 'NoteController@store')->name('notes.store');
