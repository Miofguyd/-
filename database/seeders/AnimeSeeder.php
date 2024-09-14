<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animes')->insert([
            'name' => 'ドラゴンボール',
            'picture' => null,
            'director' => '西尾大介' ,
            'original_work' => '漫画「ドラゴンボール」',
            'star_total' => '500',
            'review_total' => '100',
            'review_id' => 1,
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
            ]);
    }
}
