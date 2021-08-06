<?php

namespace App\Http\Requests;

use App\Models\UpcomingProker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUpcomingProkerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('upcoming_proker_edit');
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
