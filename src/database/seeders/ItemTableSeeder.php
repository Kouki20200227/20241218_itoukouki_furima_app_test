<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'category_item_id' => '1',
            'condition_id' => '1',
            'item_image' => 'public/storage/item_img/Armani+Mens+Clock.jpg',
            'product_name' => '腕時計',
            'item_detail' => 'スタイリッシュなデザインのメンズ腕時計',
            'item_price' => '15000',
            'favorite' => '3',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'category_item_id' => '1',
            'condition_id' => '2',
            'item_image' => 'public/storage/item_img/HDD+Hard+Disk.jpg',
            'product_name' => 'HDD',
            'item_detail' => '高速で信頼性の高いハードディスク',
            'item_price' => '5000',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '1',
            'category_item_id' => '1',
            'condition_id' => '3',
            'item_image' => 'public/storage/item_img/iLoveIMG+d.jpg',
            'product_name' => '玉ねぎ3束',
            'item_detail' => '新鮮な玉ねぎ3束セット',
            'item_price' => '300',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '1',
            'category_item_id' => '1',
            'condition_id' => '4',
            'item_image' => 'public/storage/item_img/Leather+Shoes+Product+Photo.jpg',
            'product_name' => '革靴',
            'item_detail' => 'クラシックなデザインの革靴',
            'item_price' => '4000',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'category_item_id' => '1',
            'condition_id' => '1',
            'item_image' => 'public/storage/item_img/Living+Room+Laptop.jpg',
            'product_name' => 'ノートPC',
            'item_detail' => '高性能なノートパソコン',
            'item_price' => '45000',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'category_item_id' => '1',
            'condition_id' => '2',
            'item_image' => 'public/storage/item_img/Music+Mic+4632231.jpg',
            'product_name' => 'マイク',
            'item_detail' => '高音質のレコーディング用マイク',
            'item_price' => '8000',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'category_item_id' => '1',
            'condition_id' => '3',
            'item_image' => 'public/storage/item_img/Purse+fashion+pocket.jpg',
            'product_name' => 'ショルダーバッグ',
            'item_detail' => 'おしゃれなショルダーバッグ',
            'item_price' => '3500',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '1',
            'category_item_id' => '1',
            'condition_id' => '4',
            'item_image' => 'public/storage/item_img/Tumbler+souvenir.jpg',
            'product_name' => 'タンブラー',
            'item_detail' => '使いやすいタンブラー',
            'item_price' => '500',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '1',
            'category_item_id' => '1',
            'condition_id' => '1',
            'item_image' => 'public/storage/item_img/Waitress+with+Coffee+Grinder.jpg',
            'product_name' => 'コーヒーミル',
            'item_detail' => '手動のコーヒーミル',
            'item_price' => '4000',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'category_item_id' => '1',
            'condition_id' => '2',
            'item_image' => 'public/storage/item_img/外出メイクアップセット.jpg',
            'product_name' => 'メイクセット',
            'item_detail' => '便利なメイクアップセット',
            'item_price' => '2500',
            'favorite' => '0',
            'buy_flg' => '0'
        ];
        DB::table('items')->insert($param);
    }
}
