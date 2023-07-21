<?php

namespace Database\Factories;

use App\Models\{Project, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name'    => $this->faker->sentence(),
        ];
    }
}
