<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', function() {
   return [
       ['title'=>'Produto A'],
       ['title'=>'Produto B']
   ];
});

Route::get('services', function() {
    return [
        ['service' => 'Empregada'],
        ['service' => 'Cozinheira'],
        ['service' => 'Baba'],
        ['service' => 'massagista'],
        ['service' => 'vigilante'],

        ['price' => '200.90'],
        ['price' => '299.90'],
        ['price' => '150.90'],
        ['price' => '100.00'],
        ['price' => '300.00'],

    ];
});
