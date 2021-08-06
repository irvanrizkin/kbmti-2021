<?php

namespace App\Http\Requests;

use App\Models\EventFieldChoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventFieldChoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_field_choice_edit');
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
