<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'This is home page.';
});

Route::get('/about', function () {
    return 'This is about page.';
});