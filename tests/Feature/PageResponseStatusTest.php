<?php

test('testando codigo 200')
    ->get('/')
    ->assertStatus(200);

test('testando codigo 404')
    ->get('/404')
    ->assertStatus(404)
    ->assertNotFound();

test('testanddo codigo 403:: nao tem permissao de acesso')
    ->get('/403')
    ->assertStatus(403)
    ->assertForbidden();