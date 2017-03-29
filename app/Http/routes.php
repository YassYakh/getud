<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('etd','EtudiantController');
Route::get('mat/chercher','MatiereController@chercher' );
Route::get('mat/remplie/{mat}','MatiereController@remplie' )->name('mat.remplie');
Route::get('mat/rempnote','MatiereController@rempnote' )->name('mat.rempnote');
Route::resource('mat','MatiereController');
Route::get('prof/chercher','ProfController@chercher' );
Route::resource('prof','ProfController');


