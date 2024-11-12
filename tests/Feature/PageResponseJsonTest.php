<?php


test('nossa api de produtos precisa retornar a lista de produtos')
    ->get('/api/products')
    ->assertOk()
    ->assertExactJson([
        ['title' => 'Produto A'],
        ['title' => 'Produto B']
    ]);
