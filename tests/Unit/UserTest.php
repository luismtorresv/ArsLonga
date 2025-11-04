<?php

/**
 * @author Luis Torres
 */

use App\Models\User;

test('id is not mass-assignable', function () {
    // Create a new User with a specified ID.
    $user = new User([
        'id' => 42,
        'name' => 'Douglas Adams',
    ]);

    // Check that the id is not fillable.
    expect($user->isFillable('id'))->toBeFalse();

    // Check that the id is indeed null.
    // Note that we don't use the getter as it throws a Type Error.
    expect($user->getAttribute('id'))->toBeNull();
});

test('balance is not mass-assignable', function () {
    // Create a new User with an absurd amount of money.
    $user = new User([
        'name' => 'Douglas Adams',
        'balance' => 42_000_0000,
    ]);

    // Check that the balance is not fillable.
    expect($user->isFillable('balance'))->toBeFalse();

    // Check that the balance is indeed null.
    // Note that we don't use the getter as it throws a Type Error.
    expect($user->getAttribute('balance'))->toBeNull();
});
