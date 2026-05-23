<?php

use App\Models\User;
use App\Models\Idea;

it('creates a new idea', function() {
    $this->actingAs($user = User::factory()->create()); 

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Some example Title')
        ->click('@button-status-completed')
        ->fill('description', 'An example description')
        ->click('Create')
        ->assertPathIs('/ideas');

        expect($user->ideas()->first())->toMatchArray([
            'title' => 'Some example Title',
            'status' => 'completed',
            'description' => 'An example description',
        ]);
});