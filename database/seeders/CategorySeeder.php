<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name_ja' => 'ファッション',
                'name_en' => 'Fashion',
                'slug' => 'fashion',
                'icon' => 'fa fa-shirt',
            ],
            [
                'name_ja' => 'エレクトロニクス',
                'name_en' => 'Electronics',
                'slug' => 'electronics',
                'icon' => '',
            ],
            [
                'name_ja' => 'スウィートホーム',
                'name_en' => 'Sweet Home',
                'slug' => 'sweet_home',
                'icon' => 'fa fa-house',
            ],
            [
                'name_ja' => '家電製品',
                'name_en' => 'Appliances',
                'slug' => 'appliances',
                'icon' => '',
            ],
            [
                'name_ja' => 'ビューティ',
                'name_en' => 'Beauty',
                'slug' => 'beauty',
                'icon' => '',
            ],
        ]);
    }
}
