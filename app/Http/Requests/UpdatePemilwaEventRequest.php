<?php

namespace App\Http\Requests;

use App\Models\PemilwaEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePemilwaEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pemilwa_event_edit');
    }

    public function rules()
    {
        return [
            'tahun' => [
                'string',
                'nullable',
            ],
        ];
    }
}
