<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sled;
use App\Models\User;
use DateTime;


class SledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';
         for( $i = 1 ; $i <= 10 ; $i++) {
		$sled = new Sled;
		$sled->title = "$i 番目の投稿";
		$sled->content = $content;
		$sled->user_id = 1;
		$sled->comment_count = 0; 
		$sled->save();
    }
}
}