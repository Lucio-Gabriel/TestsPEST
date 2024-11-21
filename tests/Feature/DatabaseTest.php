<?php

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

// testing product creation
it('should be able o create a product', function () {
    postJson(
        route('product.store'),
        ['title' => 'Titulo qualquer']
    )->assertCreated();

    // Veriicando se existe no banco de dados
    assertDatabaseHas('products', [
       'title' => 'Titulo qualquer'
    ]);

    // Verifcando se existe, fazendo query
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
    $product =\App\Models\Product::factory()->create(['title' => 'Titulo qualquer']);

    //Atualizando meu produto
    \Pest\Laravel\putJson(
        route('product.update', $product),
        ['title' => 'Atualizando o titulo']
    )->assertOk();

    //Verificando no banco de dados (consulta)
    assertDatabaseHas('products', [
        'id' => $product->id,
        'title' => 'Atualizando o titulo'
    ]);

    //Atualizadando e dando Refresh no banco de dados
    expect($product)
        ->refresh()
        ->title->toBe('Atualizando o titulo');

    //O que estou esperando da atualizacao
    \PHPUnit\Framework\assertSame('Atualizando o titulo', $product->title);

    //Garantindo que no meu banco de dados continue apenas um registro
    assertDatabaseCount('products', 1);
});

// testing the creation of delete product
it('should be able to delete a product', function () {

    $product = \App\Models\Product::factory()->create();

    // funcao de deletar
    \Pest\Laravel\deleteJson(route('product.destroy', $product))
        ->assertOk();

    // verificando na tabela de produto que nao tenho nenhum ID
    \Pest\Laravel\assertDatabaseMissing('products', [
        'id' => $product->id
    ]);

    //Confirmando a contagem de itens no meu banco de dados
    assertDatabaseCount('products', 0);
});













