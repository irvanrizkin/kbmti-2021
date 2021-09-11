<?php

namespace App\Http\Requests;

use App\Models\BankSoalMateri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBankSoalMateriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_soal_materi_edit');
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
            'sub_type' => [
                'required',
            ],
        ];
    }
}
