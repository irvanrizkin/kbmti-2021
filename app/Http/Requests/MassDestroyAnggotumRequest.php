<?php

namespace App\Http\Requests;

use App\Models\Anggotum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAnggotumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('anggotum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:anggota,id',
        ];
    }
}
