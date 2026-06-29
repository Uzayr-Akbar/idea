<?php

it('creates a new idea', function () {
    $this->actingAs(App\Models\User::factory()->create());

    $title = fake()->sentence();
    $description = fake()->paragraph();

    visit(route('idea.index'))
        ->click('@createIdeaForm')
        ->click('@button-status-completed')
        ->fill('title', $title)
        ->fill('description', $description)
        ->click('@button-submit')
        ->assertSee($title)
        ->assertSee($description);
});
