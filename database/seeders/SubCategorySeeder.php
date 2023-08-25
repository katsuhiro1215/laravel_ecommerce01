<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('sub_categories')->insert([
            [
                'category_id' => 1,
                'name_ja' => '男性用トップウェア',
                'name_en' => 'Mens Top Ware',
                'slug' => 'mens_top_ware',
            ],
            [
                'category_id' => 1,
                'name_ja' => '男性用ボトムウェア',
                'name_en' => 'Mens Bottom Ware',
                'slug' => 'mens_bottom_ware',
            ],
            [
                'category_id' => 1,
                'name_ja' => '男性用フットウェア',
                'name_en' => 'Mens Foot Ware',
                'slug' => 'mens_foot_ware',
            ],
            [
                'category_id' => 1,
                'name_ja' => '女性用フットウェア',
                'name_en' => 'Womens Foot Ware',
                'slug' => 'womens_foot_ware',
            ],
            [
                'category_id' => 2,
                'name_ja' => 'コンピュータ周辺機器',
                'name_en' => 'Computer Peripherals',
                'slug' => 'mens_foot_ware',
            ],
            [
                'category_id' => 2,
                'name_ja' => 'モバイルアクセサリ',
                'name_en' => 'Mobile Accessory',
                'slug' => 'mobile_accessory',
            ],
            [
                'category_id' => 2,
                'name_ja' => 'ゲーミング',
                'name_en' => 'Gaming',
                'slug' => 'gaming',
            ],
            [
                'category_id' => 3,
                'name_ja' => '家財道具',
                'name_en' => 'Home Furnishings',
                'slug' => 'home_furnishings',
            ],
            [
                'category_id' => 3,
                'name_ja' => 'リビングルーム',
                'name_en' => 'Living Room',
                'slug' => 'living_room',
            ],
            [
                'category_id' => 3,
                'name_ja' => '室内装飾',
                'name_en' => 'Home Decor',
                'slug' => 'home_decor',
            ],
            [
                'category_id' => 4,
                'name_ja' => 'コンピュータ周辺機器',
                'name_en' => 'Televisions',
                'slug' => 'televisions',
            ],
            [
                'category_id' => 4,
                'name_ja' => '洗濯機',
                'name_en' => 'Washing Machines',
                'slug' => 'washing_machines',
            ],
            [
                'category_id' => 4,
                'name_ja' => '冷蔵庫',
                'name_en' => 'Refrigerators',
                'slug' => 'refrigerators',
            ],
            [
                'category_id' => 5,
                'name_ja' => '美容と健康',
                'name_en' => 'Beauty and Personal Care',
                'slug' => 'beauty_and_personal_care',
            ],
            [
                'category_id' => 5,
                'name_ja' => '食品と飲み物',
                'name_en' => 'Food and Drinks',
                'slug' => 'food_and_drinks',
            ],
            [
                'category_id' => 5,
                'name_ja' => 'ボディケア',
                'name_en' => 'Body Care',
                'slug' => 'body_care',
            ],
        ]);
    }
}
