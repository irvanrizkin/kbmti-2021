<?php

namespace App\Http\Requests;

use App\Models\UpcomingProker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUpcomingProkerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('upcoming_proker_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'caption' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
        ];
    }
}
