<?php

namespace Database\Seeders;

use App\Models\{Event, Project, Target, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        $project = Project::factory()
            ->for($user)
            ->create();

        $target = Target::factory()
            ->for($project)
            ->create();

        Event::factory(50)
            ->for($project)
            ->for($target)
            ->create();
    }
}
