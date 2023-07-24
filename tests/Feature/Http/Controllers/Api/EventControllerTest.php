<?php

use App\Jobs\Api\EventCreation;
use App\Models\{User};
use Illuminate\Support\Facades\Queue;

use function Pest\Laravel\{assertDatabaseCount, assertDatabaseEmpty, assertDatabaseHas};

it('should not be able to create event with a wrong project token', function () {
    $this->withToken(123)->postJson(route('api.events.create'), [
        'event' => [
            'name'    => fake()->name(),
            'payload' => [
                'value' => fake()->randomFloat(2, 0, 100),
            ],
        ],
        'target' => [
            'remote_id' => fake()->randomNumber(),
            'name'      => fake()->name(),
            'email'     => fake()->email(),
        ],
    ])->assertUnauthorized();

    assertDatabaseEmpty('events');
});

it('should be able to push queue successfully', function () {
    Queue::fake();

    $project = createTestProject(user: User::factory()->create());

    $this->withToken($project->id)->postJson(route('api.events.create'), [
        'event' => [
            'name'    => fake()->name(),
            'payload' => [
                'value' => fake()->randomFloat(2, 0, 100),
            ],
        ],
        'target' => [
            'remote_id' => fake()->randomNumber(),
            'name'      => fake()->name(),
            'email'     => fake()->email(),
        ],
    ])->assertNoContent();

    Queue::assertPushed(EventCreation::class);
});

it('should be able to create event', function () {
    $project = createTestProject(user: User::factory()->create());

    $this->withToken($project->id)->postJson(route('api.events.create'), [
        'event' => [
            'name'    => $event = fake()->name(),
            'payload' => [
                'value' => fake()->randomFloat(2, 0, 100),
            ],
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
