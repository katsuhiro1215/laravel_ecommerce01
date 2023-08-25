<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_sub_categories')->insert([
            [
                'category_id' => 1,
                'sub_category_id' => 1,
                'name_ja' => '男性用 Tシャツ',
                'name_en' => 'Mens T-shirt',
                'slug' => 'mens_t-shirt',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 1,
                'name_ja' => '男性用 カジュアルシャツ',
                'name_en' => 'Mens Casual Shirt',
                'slug' => 'mens_casual_shirt',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 1,
                'name_ja' => '男性用 パジャマ',
                'name_en' => 'Mens Kurtas',
                'slug' => 'mens_kurtas',
            ],
            
            [
                'category_id' => 1,
                'sub_category_id' => 2,
                'name_ja' => '男性用 ジーンズ',
                'name_en' => 'Mens Trousers',
                'slug' => 'Trousers',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 2,
                'name_ja' => '男性用 カジュアルシャツ',
                'name_en' => 'Mens Casual Cargos',
                'slug' => 'Cargos',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 2,
                'name_ja' => '男性用 パジャマ',
                'name_en' => 'Mens Kurtas',
                'slug' => 'mens_kurtas',
            ],

            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name_ja' => '男性用 スポーツシューズ',
                'name_en' => 'Mens Sports Shoes',
                'slug' => 'mens_sports_shoes',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name_ja' => '男性用 カジュアルシューズ',
                'name_en' => 'Mens Casual Shoes',
                'slug' => 'mens_casual_shoes',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name_ja' => '男性用 一般シューズ',
                'name_en' => 'Mens Formal Shoes',
                'slug' => 'mens_formal_shoes',
            ],

            [
                'category_id' => 1,
                'sub_category_id' => 4,
                'name_ja' => '女性用 フラットシューズ',
                'name_en' => 'Womens Flats Shoes',
                'slug' => 'womens_flats_shoes',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 4,
                'name_ja' => '女性用 ヒール',
                'name_en' => 'Womens Heels',
                'slug' => 'womens_heels',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 4,
                'name_ja' => '女性用 スニーカー',
                'name_en' => 'Womens Sheakers',
                'slug' => 'womens_sheakers',
            ],

            [
                'category_id' => 2,
                'sub_category_id' => 5,
                'name_ja' => 'プリンター',
                'name_en' => 'Printers',
                'slug' => 'printers',
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 5,
                'name_ja' => 'モニター',
                'name_en' => 'Monitors',
                'slug' => 'monitors',
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 1,
                'name_ja' => 'プロジェクター',
                'name_en' => 'Projectors',
                'slug' => 'projectors',
            ],

            [
                'category_id' => 2,
                'sub_category_id' => 6,
                'name_ja' => '一般ケース',
                'name_en' => 'Plain Cases',
                'slug' => 'plain_cases',
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 6,
                'name_ja' => 'デザイナーケース',
                'name_en' => 'Designer Cases',
                'slug' => 'designer_cases',
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 6,
                'name_ja' => 'スクリーンガード',
                'name_en' => 'Screen Guards',
                'slug' => 'screen_guards',
            ],

            [
                'category_id' => 2,
                'sub_category_id' => 7,
                'name_ja' => 'ゲーミングマウス',
                'name_en' => 'Gaming Mouse',
                'slug' => 'gaming_mouse',
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 7,
                'name_ja' => '男性用 カジュアルシャツ',
                'name_en' => 'Gaming Keyboars',
                'slug' => 'gaming_keyboars',
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 7,
                'name_ja' => 'ゲーミングマウスパッド',
                'name_en' => 'Gaming Mousepads',
                'slug' => 'gaming_mousepads',
            ],

            [
                'category_id' => 3,
                'sub_category_id' => 8,
                'name_ja' => 'ベッドライナー',
                'name_en' => 'Bed Liners',
                'slug' => 'bed_liners',
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 8,
                'name_ja' => 'ベッドシース',
                'name_en' => 'Bedsheets',
                'slug' => 'bedsheets',
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 8,
                'name_ja' => 'ブランケット',
                'name_en' => 'Blanket',
                'slug' => 'blanket',
            ],

            [
                'category_id' => 3,
                'sub_category_id' => 9,
                'name_ja' => 'TV ユニット',
                'name_en' => 'Tv Units',
                'slug' => 'Tv Units',
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 9,
                'name_ja' => 'ダイニングセット',
                'name_en' => 'Dining Sets',
                'slug' => 'dining_sets',
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 9,
                'name_ja' => 'コーヒーテーブル',
                'name_en' => 'Coffee Tables',
                'slug' => 'coffee_tables',
            ],

            [
                'category_id' => 3,
                'sub_category_id' => 10,
                'name_ja' => 'ライトニング',
                'name_en' => 'Lightings',
                'slug' => 'lightings',
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 10,
                'name_ja' => 'クローク',
                'name_en' => 'Clocks',
                'slug' => 'clocks',
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 10,
                'name_ja' => 'ウォールデコレーター',
                'name_en' => 'Wall Decor',
                'slug' => 'wall_decor',
            ],

            [
                'category_id' => 4,
                'sub_category_id' => 11,
                'name_ja' => 'ビッグスクリーンTV',
                'name_en' => 'Big Screen TVs',
                'slug' => 'big_screen_tvs',
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 11,
                'name_ja' => 'スマートTV',
                'name_en' => 'Smart TVs',
                'slug' => 'smart_tvs',
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 11,
                'name_ja' => '旧式TV',
                'name_en' => 'OLED TVs',
                'slug' => 'old_tvs',
            ],

            [
                'category_id' => 4,
                'sub_category_id' => 12,
                'name_ja' => '洗濯乾燥機',
                'name_en' => 'Washer Dryers',
                'slug' => 'washer_dryers',
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 12,
                'name_ja' => '洗濯のみ',
                'name_en' => 'Washer Only',
                'slug' => 'washer_only ',
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 12,
                'name_ja' => 'エネルギー効率',
                'name_en' => 'Energy Efficient',
                'slug' => 'energy_efficient',
            ],

            [
                'category_id' => 4,
                'sub_category_id' => 13,
                'name_ja' => '1ドア式冷蔵庫',
                'name_en' => 'Single Door',
                'slug' => 'Single Door',
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 13,
                'name_ja' => '2ドア式冷蔵庫',
                'name_en' => 'Double Door',
                'slug' => 'double_door',
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 13,
                'name_ja' => 'ミニ冷蔵庫',
                'name_en' => 'Mini Rerigerators',
                'slug' => 'mini_rerigerators',
            ],

            [
                'category_id' => 5,
                'sub_category_id' => 14,
                'name_ja' => 'コンタクトメイクアップ',
                'name_en' => 'Eys Makeup',
                'slug' => 'eys_makeup',
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 14,
                'name_ja' => 'リップメイクアップ',
                'name_en' => 'Lip Makeup',
                'slug' => 'lip_makeup',
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 14,
                'name_ja' => 'ヘアケア',
                'name_en' => 'Hair Care',
                'slug' => 'hair_care',
            ],

            [
                'category_id' => 5,
                'sub_category_id' => 15,
                'name_ja' => 'パン',
                'name_en' => 'Beverages',
                'slug' => 'beverages',
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 15,
                'name_ja' => 'チョコレート',
                'name_en' => 'Chocolates',
                'slug' => 'chocolates',
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 15,
                'name_ja' => 'スナック',
                'name_en' => 'Snacks',
                'slug' => 'snacks',
            ],

            [
                'category_id' => 5,
                'sub_category_id' => 16,
                'name_ja' => 'ボディおむつ',
                'name_en' => 'Body Diapers',
                'slug' => 'body_diapers',
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 16,
                'name_ja' => 'ボディワイプ',
                'name_en' => 'Body Wipes',
                'slug' => 'body_wipes',
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 16,
                'name_ja' => '健康食品',
                'name_en' => 'Body Food',
                'slug' => 'body_food',
            ],
        ]);
    }
}
