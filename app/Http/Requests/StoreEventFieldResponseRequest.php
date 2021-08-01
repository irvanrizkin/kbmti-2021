<?php

namespace App\Http\Requests;

use App\Models\EventFieldResponse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventFieldResponseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_field_response_create');
    }

    public function rules()
    {
        return [
            'response' => [
                'string',
                'nullable',
            ],
        ];
    }
}
