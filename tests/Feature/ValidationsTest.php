<?php

use function Pest\Laravel\post;
use function Pest\Laravel\postJson;

test('product :: title should be required', function () {

    postJson(route('product.store'), ['title' => ''])
        ->assertInvalid(['title' => 'required']);

    post(route('product.store'), ['title' => ''])
        ->assertInvalid(['title' => 'required']);

});

test('product :: title should have a max of 255 characters', function () {

    postJson(route('product.store'), ['title' => str_repeat('*', 256) ])
        ->assertInvalid([
            'title' => trans('validation.max.string', ['attribute' => 'title', 'max' => 255])
        ]);
});

// rodando um conjuto de dados
test('create product validations', function ($data, $error) {
    postJson(route('product.store'), $data)
        ->assertInvalid($error);
})->with([
    'title:required' => [['title' => ''], ['title' => 'required']],
    'title:max:255' => [['title' => ''], ['title' => 'The title field is required.']]
]);











