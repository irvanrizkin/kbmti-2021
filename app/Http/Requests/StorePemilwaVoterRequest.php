<?php

namespace App\Http\Requests;

use App\Models\PemilwaVoter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePemilwaVoterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pemilwa_voter_create');
    }

    public function rules()
    {
        return [
            'nim' => [
                'string',
                'nullable',
            ],
            'token' => [
                'string',
                'nullable',
            ],
        ];
    }
}
