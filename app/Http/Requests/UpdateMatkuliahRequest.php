<?php

namespace App\Http\Requests;

use App\Models\Matkuliah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMatkuliahRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('matkuliah_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'semester' => [
                'string',
                'required'
            ],
        ];
    }
}
