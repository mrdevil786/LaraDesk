<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.home');
});

Route::get('/about', function () {
    return 'This is about page.';
});