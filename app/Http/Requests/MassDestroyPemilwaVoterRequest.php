<?php

namespace App\Http\Requests;

use App\Models\PemilwaVoter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPemilwaVoterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pemilwa_voter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pemilwa_voters,id',
        ];
    }
}
