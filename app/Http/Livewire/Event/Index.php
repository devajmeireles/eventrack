<?php

namespace App\Http\Livewire\Event;

use App\Http\Livewire\Traits\Table;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    use Table;

    public User $user;

    public function boot(): void
    {
        $this->sort = 'name';
    }

    public function render(): View
    {
        return view('livewire.event.index', [
            'events' => $this->user->events()
                ->orderBy($this->sort, $this->direction)
                ->paginate(10),
        ]);
    }
}
