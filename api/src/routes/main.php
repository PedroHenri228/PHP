<?php 


use App\Http\Route;

Route::get('/', 'HomeController@index');
Route::get('/about/{id}', 'HomeController@index');
;