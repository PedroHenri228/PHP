<?php

use App\Http\Route;

Route::get('/', 'HomeController@index');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

$method = $_SERVER['REQUEST_METHOD'];

$url = isset($_GET['url']) ? '/' . trim($_GET['url'], '/') : '/';

Route::dispatch($method, $url);
