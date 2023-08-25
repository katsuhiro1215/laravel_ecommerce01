<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('category_id');
            $table->foreignId('sub_category_id');
            $table->foreignId('sub_sub_category_id');
            $table->string('name_ja');
            $table->string('name_en');
            $table->string('slug');
            $table->string('code');
            $table->string('qty');
            $table->string('tag_ja');
            $table->string('tag_en');
            $table->string('size')->nullable();
            $table->string('color_ja');
            $table->string('color_en');
            $table->string('selling_price')->comment('販売価格');
            $table->string('discount_price')->nullable()->comment('割引価格');
            $table->string('short_description_ja');
            $table->string('short_description_en');
            $table->text('long_description_ja')->comment('商品詳細(JA)');
            $table->text('long_description_en')->comment('商品詳細(EN)');
            $table->string('thumbnail')->comment('メインサムネイル画像');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
