<?php

namespace App\Http\Requests;

use App\Models\EventField;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventFieldRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_field_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'event_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
