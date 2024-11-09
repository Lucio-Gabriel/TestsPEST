<?php

use App\Models\Product;

use function Pest\Laravel\get;

it('deve listar produtos')
    ->get('/products')
    ->assertOk()
    ->assertSeeTextInOrder([
        'Produto A',
        'Produto B'
    ]);

// test('deve listar produtos do banco de dados', function() {
//     $product1 = Product::factory()->create();
//     $product2 = Product::factory()->create();

//     get('products')
//     ->assertSeeTextInOrder([
//         'Produto A',
//         'Produto B',
//         $product1->title,
//         $product2->title,
//     ]);
// });