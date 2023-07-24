<?php

namespace App\Jobs\Api;

use App\Models\{Event, Project};
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\{ShouldQueue};
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{InteractsWithQueue, SerializesModels};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class EventCreation implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly string $token,
        private readonly array $data
    ) {
    }

    public function handle(): void
    {
        /** @var Project $project */
        $project = Cache::get("event::creation::{$this->token}");

        $target = $this->data['target'];
        $target = $project->targets()->firstOrCreate([
            'email' => $target['email'],
        ], [
            ...Arr::except($target, 'id'),
        ]);

        Event::make([...$this->data['event']])
            ->project()->associate($project)
            ->target()->associate($target)
            ->save();
    }
}
