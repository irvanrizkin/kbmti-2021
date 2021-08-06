<?php

namespace App\Http\Requests;

use App\Models\EventField;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEventFieldRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('event_field_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:event_fields,id',
        ];
    }
}
