<?php

namespace App\Http\Resources\Api\Target;

use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Target */
class TargetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->remote_id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
