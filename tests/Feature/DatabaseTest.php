<?php
// testing product creation
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

it('should be able o create a product', function () {
    postJson(
        route('product.store'),
        ['title' => 'Titulo qualquer']
    )->assertCreated();

    // Veriicando se existe no banco de dados
    assertDatabaseHas('products', [
       'title' => 'Titulo qualquer'
    ]);

    // Verifcando se existe, mas fazendo query
    \PHPUnit\Framework\assertTrue(
        \App\Models\Product::query()
            ->where('title', '=', 'Titulo qualquer')
            ->exists()
    );

    // Verificando se existe somente esse registro
    assertDatabaseCount('products', 1);

});

//testing the creation of a product update
it('should be able to update a product', function () {

})->todo();

// testing the creation of delete product
it('should be able to delete a product', function () {

})->todo();













