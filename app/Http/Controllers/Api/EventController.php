<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Event\EventCreationRequest;
use App\Jobs\Api\EventCreation;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function __invoke(EventCreationRequest $request): Response
    {
        EventCreation::dispatch($request->get('token'), $request->validated());

        return response()->noContent();
    }
}
