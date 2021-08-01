<?php

namespace App\Http\Requests;

use App\Models\UpcomingProker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUpcomingProkerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('upcoming_proker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:upcoming_prokers,id',
        ];
    }
}
