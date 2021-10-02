<?php

namespace App\Http\Requests;

use App\Models\Oprec;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOprecRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('oprec_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'nim' => [
                'string',
                'required',
            ],
            'angkatan' => [
                'string',
                'required',
            ],
            'tempat_lahir' => [
                'string',
                'required',
            ],
            'tanggal_lahir' => [
                'string',
                'required',
            ],
            'alamat' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'id_line' => [
                'string',
                'required',
            ],
            'no_hp' => [
                'string',
                'required',
            ],
        ];
    }
}
