<?php

namespace App\Http\Requests;

use App\Models\Anggotum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAnggotumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('anggotum_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'image' => [
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
            'department_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
                'string',
            ]
        ];
    }
}
