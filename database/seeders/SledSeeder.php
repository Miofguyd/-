<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class SledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sleds')->insert([
            'user_id' => 1,
            'title' => 'ワンピース最新話について',
            'message' => '最新話すごく良かった！',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
            ]);
    }
}
