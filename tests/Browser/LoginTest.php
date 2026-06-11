<?php

it('registers a new user', function () {
    visit('/login')
        ->fill('email', fake()->safeEmail())
        ->fill('password', 'Password1234!!@')
        ->click('@register')
        ->assertPathIs('/');

    $this->assertAuthenticated();
});
