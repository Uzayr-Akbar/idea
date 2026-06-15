<?php
use App\Models\User;


it('registers a new user', function () {
$user = User::factory()->create(['password' => '171803UUi!']);

$this->visit('/login')
    ->fill('email', $user->email)
    ->fill('password', '171803UUi!')
    ->click('@login-btn')
    ->assertPathIs('/');
    /** @var Tests\TestCase $this */
    $this->assertAuthenticated();
    });
