<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 誤作動防止のためコメントアウト
        // $this->call(ItemTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(ConditionTableSeeder::class);

        // テーブル内データ一括削除
        // \App\Models\Item::truncate();
    }
}
