<?php

/**
 * @author Luis Torres
 */

use App\Models\Artwork;
use App\Models\User;

test('admin can create an auction', function () {
    $admin = User::factory()->create();
    $admin->setRole('admin');

    $artwork = Artwork::factory()->create();

    $response = $this->actingAs($admin)
        ->post(route('admin.auction.save'),
            [
                'start_date' => '2025-04-17T05:50',
                'final_date' => '2025-04-17T06:00',
                'artwork_id' => $artwork->getId(),
            ]
        );

    $this->assertAuthenticated();
    $response->assertRedirect(route('admin.auction.createSuccess'));
});
