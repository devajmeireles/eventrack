<?php

namespace Database\Factories;

use App\Models\{Project, Target};
use Illuminate\Database\Eloquent\Factories\Factory;

class TargetFactory extends Factory
{
    protected $model = Target::class;

    public function definition(): array
    {
        return [
            'remote_id'  => $this->faker->randomDigit(),
            'project_id' => Project::factory(),
            'name'       => $this->faker->name(),
            'email'      => $this->faker->unique()->safeEmail(),
            'avatar'     => $this->faker->imageUrl(),
            'properties' => [],
        ];
    }
}
