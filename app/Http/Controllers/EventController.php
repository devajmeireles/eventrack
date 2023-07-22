<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('events.index', [
            'user' => user(),
        ]);
    }
}
