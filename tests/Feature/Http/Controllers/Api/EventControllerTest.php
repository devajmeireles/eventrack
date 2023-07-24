<?php

use App\Jobs\Api\EventCreation;
use App\Models\{Project, User};
use Illuminate\Support\Facades\Queue;

use function Pest\Laravel\{assertDatabaseCount, assertDatabaseHas};

it('should be able to create event', function () {
    $user = User::factory()->create();

    $project = Project::factory()
        ->for($user)
        ->create();

    $this->withToken($project->id)->postJson(route('api.events.create'), [
        'event'   => $event = fake()->name(),
        'payload' => [
            'value' => fake()->randomFloat(2, 0, 100),
        ],
        'target' => [
            'remote_id' => $remoteId = fake()->randomNumber(),
            'name'      => $name     = fake()->name(),
            'email'     => $email    = fake()->email(),
        ],
    ])->assertNoContent();

    assertDatabaseHas('targets', [
        'remote_id' => $remoteId,
        'name'      => $name,
        'email'     => $email,
    ]);

    assertDatabaseHas('events', [
        'name'       => $event,
        'project_id' => $project->id,
    ]);

    assertDatabaseCount('events', 1);
});

it('should be able to push queue successfully', function () {
    Queue::fake();

    $user = User::factory()->create();

    $project = Project::factory()
        ->for($user)
        ->create();

    $this->withToken($project->id)->postJson(route('api.events.create'), [
        'event'   => fake()->name(),
        'payload' => [
            'value' => fake()->randomFloat(2, 0, 100),
        ],
        'target' => [
            'remote_id' => fake()->randomNumber(),
            'name'      => fake()->name(),
            'email'     => fake()->email(),
        ],
    ])->assertNoContent();

    Queue::assertPushed(EventCreation::class);
});
