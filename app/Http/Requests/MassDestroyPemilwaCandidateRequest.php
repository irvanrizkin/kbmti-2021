<?php

namespace App\Http\Requests;

use App\Models\PemilwaCandidate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPemilwaCandidateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pemilwa_candidate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pemilwa_candidates,id',
        ];
    }
}
