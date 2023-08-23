<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name_ja' => 'required',
            'name_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id' => 'カテゴリーは必ず選択してください。',
            'name_ja' => 'カテゴリー名(JA)は必須です。',
            'name_en' => 'カテゴリー名(EN)は必須です。',
        ];
    }
}
