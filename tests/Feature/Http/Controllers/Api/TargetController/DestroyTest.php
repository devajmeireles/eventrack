<?php

use App\Models\Target;
use function Pest\Laravel\assertModelMissing;

it('should be able to destroy target', function () {
    $project = createTestProject();

    $target = Target::factory()
        ->for($project)
        ->create();

    $this->withToken($project->id)->delete(route('targets.update', $target))
        ->assertNoContent();

    assertModelMissing($target);
});


it('should not be able to destroy non-existent target', function () {
    $this->withToken(createTestProject()->id)->delete(route('targets.update', 123))
        ->assertNotFound();
});
