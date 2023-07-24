<?php

namespace App\Http\Middleware\Api;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeEventCreation
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        abort_if(!$token, Response::HTTP_FORBIDDEN, 'No project token provided.');

        abort_if(!($project = Project::find($token)), Response::HTTP_UNAUTHORIZED, 'Invalid project token.');

        Cache::put("event::creation::{$token}", $project);

        $request->merge(['token' => $token]);

        return $next($request);
    }
}
