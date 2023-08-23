<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name_ja' => 'required',
            'name_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_ja' => '必須です。',
            'name_en' => '必須です。',
        ];
    }
}
