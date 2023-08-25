<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'sub_category_id' => ['required', 'integer', 'exists:sub_categories,id'],
            'sub_sub_category_id' => ['required', 'integer', 'exists:sub_sub_categories,id'],
            'name_ja' => 'required',
            'name_en' => 'required',
            'code' => 'required',
            'qty' => 'required',
            'tag_ja' => 'required',
            'tag_en' => 'required',
            'size' => ['nullable'],
            'color_ja' => 'required',
            'color_en' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'nullable',
            'thumbnail' => 'required',
            'short_description_ja' => 'required',
            'short_description_en' => 'required',
            'long_description_ja' => 'required',
            'long_description_en' => 'required',
            'hot_details' => 'nullable',
            'featured' => 'nullable',
            'special_offer' => 'nullable',
            'special_deals' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'brand_id' => ['ブランドは必ず選択してください。'],
            'category_id' => 'カテゴリーは必ず選択してください。',
            'sub_category_id' => 'サブカテゴリーは必ず選択してください。',
            'sub_sub_category_id' => ['サブサブカテゴリーは必ず選択してください。'],
            'name_ja' => 'カテゴリー名(JA)は必須です。',
            'name_en' => 'カテゴリー名(EN)は必須です。',
            'code' => 'コードは必須です。',
            'qty' => 'コードは必須です。',
            'tag_ja' => 'タグ(JA)は必須です。',
            'tag_en' => 'タグ(EN)は必須です。',
            'color_ja' => 'カラー(JA)は必須です。',
            'color_en' => 'カラー(EN)は必須です。',
            'selling_price' => '販売価格は必須です。',
            'short_description_ja' => '商品詳細(JA)は必須です。',
            'short_description_en' => '商品詳細(EN)は必須です。',
            'long_description_ja' => '商品詳細(JA)は必須です。',
            'long_description_en' => '商品詳細(EN)は必須です。',
            'thumbnail' => 'メインサムネイル画像は必須です。',
        ];
    }
}
