<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Target\UpdateTargetRequest;
use App\Http\Resources\Api\Target\TargetResource;
use App\Models\Target;

class TargetController extends Controller
{
    public function update(UpdateTargetRequest $request, Target $target): TargetResource
    {
        return TargetResource::make(tap($target)->update($request->validated()));
    }

    public function destroy(Target $target)
    {
        $target->delete();

        return response()->noContent();
    }
}
