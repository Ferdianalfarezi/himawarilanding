<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    App::setLocale('id');

    return view('landing');
})->name('home');

Route::get('/en', function () {
    App::setLocale('en');

    return view('landing');
})->name('home.en');
