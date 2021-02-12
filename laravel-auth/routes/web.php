<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload/img', 'HomeController@uploadImg')->name('upload-img');

Route::get('/clear/img', 'HomeController@clearImg')->name('clear-img');
