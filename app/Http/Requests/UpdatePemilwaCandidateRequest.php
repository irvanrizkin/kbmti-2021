<?php

namespace App\Http\Requests;

use App\Models\PemilwaCandidate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePemilwaCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pemilwa_candidate_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'no_urut' => [
                'string',
                'nullable',
            ],
        ];
    }
}
