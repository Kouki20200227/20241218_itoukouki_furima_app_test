<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '山田 太郎',
                'email' => 'yamada@email.com',
                'email_verified_at' => null,
                'password' => 'yamada1995',
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'remember_token' => null,
            ],
            [
                'name' => 'テスト サンプル',
                'email' => 'sample@email.com',
                'email_verified_at' => null,
                'password' => 'sample12345',
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'remember_token' => null,
            ],
            [
                'name' => 'プログラム好き子',
                'email' => 'programlover@email.com',
                'email_verified_at' => null,
                'password' => 'programlover04',
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'remember_token' => null,
            ],
        ]);
    }
}
