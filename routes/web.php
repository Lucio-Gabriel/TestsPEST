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

Route::get('/products', function() {
    return view('products', [
        'products' => \App\Models\Product::all()
    ]);
});

Route::get('/drivers', function(){
    return view('drivers');
});

Route::post('/products', function() {

    \App\Models\Product::query()
        ->create(request()->only('title'));

    return response()->json('', '201');

})->name('product.store');

Route::put('/products/{product}', function (\App\Models\Product $product) {

    $product->title = request()->get('title');
    $product->save();

})->name('product.update');
