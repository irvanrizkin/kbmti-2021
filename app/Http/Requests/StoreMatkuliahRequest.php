<?php

namespace App\Http\Requests;

use App\Models\Matkuliah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMatkuliahRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('matkuliah_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
