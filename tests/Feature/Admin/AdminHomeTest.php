<?php

/**
 * @author Luis Torres
 */

use App\Models\User;

test('clients are redirected to home page when trying to access admin page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->get('/admin');

    $response->assertRedirectToRoute('home.index');
});

test('guests are redirected to login page when trying to access admin page', function () {
    $response = $this->actingAsGuest()
        ->get('/admin');

    $response->assertRedirectToRoute('login');
});
