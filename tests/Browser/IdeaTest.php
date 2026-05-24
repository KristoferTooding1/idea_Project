<?php

use App\Models\User;

it('creates a new idea', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Some example Title')
        ->click('@button-status-completed')
        ->fill('description', 'An example description')
        ->fill('@new-link', 'https://laracasts.com')
        ->click('@submit-new-link-button')
        ->fill('@new-link', 'https://laravel.com')
        ->click('@submit-new-link-button')
        ->fill('@new-step', 'do something')
        ->click('@submit-new-step-button')
        ->fill('@new-step', 'do something else')
        ->click('@submit-new-step-button')
        ->click('Create')
        ->assertPathIs('/ideas');

    expect($idea = $user->ideas()->first())->toMatchArray([
        'title' => 'Some example Title',
        'status' => 'completed',
        'description' => 'An example description',
        'links' => ['https://laracasts.com', 'https://laravel.com'],
    ]);

    expect($idea->steps)->toHaveCount(2);
});

it('edits an existing idea', function () {
    $this->actingAs($user = User::factory()->create());

    Idea::factory()->for($user)->create();

    visit(route('idea.show', $idea))
        ->click('@edit-idea-button')
        ->fill('title', 'Some example Title')
        ->click('@button-status-completed')
        ->fill('description', 'An example description')
        ->fill('@new-link', 'https://laracasts.com')
        ->click('@submit-new-link-button')
        ->fill('@new-link', 'https://laravel.com')
        ->click('@submit-new-link-button')
        ->fill('@new-step', 'do something')
        ->click('@submit-new-step-button')
        ->fill('@new-step', 'do something else')
        ->click('@submit-new-step-button')
        ->click('Create')
        ->assertPathIs('/ideas');

    expect($idea = $user->ideas()->first())->toMatchArray([
        'title' => 'Some example Title',
        'status' => 'completed',
        'description' => 'An example description',
        'links' => ['https://laracasts.com', 'https://laravel.com'],
    ]);

    expect($idea->steps)->toHaveCount(2);
});