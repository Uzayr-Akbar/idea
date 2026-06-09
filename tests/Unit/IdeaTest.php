<?php

use App\Models\User;
use App\Models\Idea;
use Illuminate\Support\Collection;

test('it belongs to a user', function () {
    $idea = Idea::factory()->create();
    expect($idea->user)->toBeInstanceOf(User::class);
});

test('it can have steps', function () {
    $idea = Idea::factory()->create();
    $idea->steps()->create([
        'description' => 'do the thing',
    ]);
});

test('it can have steps description',  function () {});
