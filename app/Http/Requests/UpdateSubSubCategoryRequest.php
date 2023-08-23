<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubSubCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'sub_category_id' => ['required', 'integer', 'exists:categories,id'],
            'name_ja' => 'required',
            'name_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id' => 'カテゴリーは必ず選択してください。',
            'sub_category_id' => 'サブカテゴリーは必ず選択してください。',
            'name_ja' => 'カテゴリー名(JA)は必須です。',
            'name_en' => 'カテゴリー名(EN)は必須です。',
        ];
    }
}
