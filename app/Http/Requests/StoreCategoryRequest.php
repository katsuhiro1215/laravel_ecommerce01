<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name_ja' => 'required',
            'name_en' => 'required',
            'icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_ja' => 'カテゴリー名(JA)は必須です。',
            'name_en' => 'カテゴリー名(EN)は必須です。',
            'icon' => 'カテゴリーアイコンは必須です。',
        ];
    }
}
