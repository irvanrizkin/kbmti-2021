<?php

namespace App\Http\Requests;

use App\Models\BankSoalMateri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBankSoalMateriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_soal_materi_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'required',
            ],
            'matkuliah_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
            ],
            'sub_type' => [
                'required',
            ],
        ];
    }
}
