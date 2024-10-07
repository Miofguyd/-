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
             'id' => 1,
             'title' => 'アニメ1',
             'casts' => '声優1',
             'review_id' =>1,
          ]);
    }
}
