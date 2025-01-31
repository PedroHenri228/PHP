<?php

use App\Http\Route;

Route::get('/', 'BookController@index');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::get('/users/{id}', 'UserController@show');

$method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/library-digital', '', $uri);

Route::dispatch($method, $uri);

