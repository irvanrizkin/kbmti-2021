<?php

namespace App\Http\Requests;

use App\Models\Anggotum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnggotumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('anggotum_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'instagram_acc' => [
                'string',
                'nullable',
            ],
            'linkedin_acc' => [
                'string',
                'nullable',
            ],
            'keanggotaan' => [
                'required',
            ],
        ];
    }
}
