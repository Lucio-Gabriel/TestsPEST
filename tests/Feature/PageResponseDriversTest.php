<?php


test('list all drivers')
    ->get('/drivers')
    ->assertOk()
    ->assertSeeTextInOrder([
        'Driver1',
        'Driver2',
        'Driver3',
    ]);