<?php


test('nossa api de produtos precisa retornar a lista de produtos')
    ->get('/api/products')
    ->assertOk()
    ->assertExactJson([
        ['title' => 'Produto A'],
        ['title' => 'Produto B']
    ]);

test('Accurate API returns list of services and prices')
    ->get('/api/services')
    ->assertOk()
    ->assertExactJson([
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
    ]);
