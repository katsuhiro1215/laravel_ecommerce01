<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name_ja' => 'アップル',
                'name_en' => 'Apple',
                'slug' => 'apple',
                'brand_photo_path' => null,
            ],
            [
                'name_ja' => 'ファーウェイ',
                'name_en' => 'Huawei',
                'slug' => 'huawei',
                'brand_photo_path' => null,
            ],
            [
                'name_ja' => 'オッポ',
                'name_en' => 'Oppo',
                'slug' => 'huawei',
                'brand_photo_path' => null,
            ],
            [
                'name_ja' => 'サムスン',
                'name_en' => 'Samsung',
                'slug' => 'samsung',
                'brand_photo_path' => null,
            ],
            [
                'name_ja' => 'ヴィーヴォ',
                'name_en' => 'Vivo',
                'slug' => 'vivo',
                'brand_photo_path' => null,
            ],
            [
                'name_ja' => 'シャオミ',
                'name_en' => 'Xiaomi',
                'slug' => 'xiaomi',
                'brand_photo_path' => null,
            ],
        ]);
    }
}
