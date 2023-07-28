<?php

use App\Models\Target;

it('should be able to update the target', function () {
    $project = createTestProject();

    $target = Target::factory()
        ->for($project)
        ->create();

    $this->withToken($project->id)->putJson(route('targets.update', $target), [
        'name' => $name = fake()->name(),
        'email' => $email = fake()->email(),
    ])->assertJson([
        'data' => [
            'name' => $name,
            'email' => $email,
        ],
    ]);

    $target->refresh();

    expect($target->name)
        ->toBe($name)
        ->and($target->email)
        ->toBe($email);
});

it('should not be able to update a non-existent target', function () {
    $this->withToken(createTestProject()->id)->putJson(route('targets.update', 123), [
        'name' => fake()->name(),
        'email' => fake()->email(),
    ])->assertNotFound();
});
