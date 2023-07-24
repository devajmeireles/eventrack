<?php

namespace App\Http\Requests\Api\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventCreationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'event'   => ['required', 'string', 'max:255'],
            'payload' => ['required', 'array'],
            'target'  => ['required', 'array'],
        ];
    }
}
