<?php

namespace App\Http\Requests;

use App\Models\EventFieldChoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEventFieldChoiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('event_field_choice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:event_field_choices,id',
        ];
    }
}
