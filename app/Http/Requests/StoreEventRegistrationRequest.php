<?php

namespace App\Http\Requests;

use App\Models\EventRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_registration_create');
    }

    public function rules()
    {
        return [
            'dummy_name' => [
                'string',
                'nullable',
            ],
            'event_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
