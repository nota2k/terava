<?php

use App\Models\User;
use function Pest\Laravel\getJson;

// test('example', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });

test('liste des utilisateurs', function () {
    User::factory()->count(3)->create();

    $response = getJson('/api/users');

    $response->assertStatus(200);
    $response->assertJsonCount(3);
});
