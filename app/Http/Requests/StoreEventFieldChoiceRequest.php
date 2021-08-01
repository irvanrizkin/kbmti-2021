<?php

namespace App\Http\Requests;

use App\Models\EventFieldChoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventFieldChoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_field_choice_create');
    }

    public function rules()
    {
        return [
            'choice' => [
                'string',
                'nullable',
            ],
        ];
    }
}
