<?php

namespace Database\Factories;

use App\Models\{Event, Project, Target};
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'target_id'  => Target::factory(),
            'name'       => $this->faker->word(),
            'payload'    => [],
        ];
    }
}
