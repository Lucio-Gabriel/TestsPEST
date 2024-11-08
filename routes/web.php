<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/404', function() {
//     return ['oi'];
// });

Route::get('/403', function() {

    abort_if(true, 403);

    return ['oi'];
});