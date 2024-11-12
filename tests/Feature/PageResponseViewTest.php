<?php

use App\Models\Product;

use function Pest\Laravel\get;

test('a rota products esta utilando a view products')
    ->get('/products')
    ->assertViewIs('products');

test('a rota products esta passando uma lista de produtos para a view products')
    ->get('/products')
    ->assertViewIs('products')
    ->assertViewHas('products');

test('a rota drivers esta utiliando a view drivers')
    ->get('/drivers')
    ->assertViewIs('drivers');




