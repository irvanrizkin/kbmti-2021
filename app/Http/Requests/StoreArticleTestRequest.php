<?php

namespace App\Http\Requests;

use App\Models\ArticleTest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArticleTestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('article_test_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'image.*' => [
                'required',
            ],
            'date_upload' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
