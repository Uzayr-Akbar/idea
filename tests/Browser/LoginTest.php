<?php

use App\Models\User;
use Tests\TestCase;

it('registers a new user', function () {
    $user = User::factory()->create(['password' => '171803UUi!']);

    $this->visit('/login')
        ->fill('email', $user->email)
        ->fill('password', '171803UUi!')
        ->click('@login-btn')
        ->assertPathIs('/');
    /** @var TestCase $this */
    $this->assertAuthenticated();
});
it('logs the user out', function () {
    /** @var User $user */
    $user = User::factory()->create();

    /** @var TestCase $this */
    $this->actingAs($user);

    visit('/')->click('@logout');
    $this->assertGuest();
});
it('requires a valid email', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john123')
        ->fill('password', 'password123!@#')
        ->click('@register')
        ->assertPathIs('/register');
});

$var = 'foobar';
